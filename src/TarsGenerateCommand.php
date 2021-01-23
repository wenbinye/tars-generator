<?php


namespace tars;


use Psr\Log\LoggerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TarsGenerateCommand extends Command
{
    private const TARS_FILE_PATH = 'tars';
    /**
     * @var LoggerInterface
     */
    private $logger;

    protected function configure(): void
    {
        $this->setName("tars:generate");
        $this->addOption("namespace", null, InputOption::VALUE_REQUIRED, "php class namespace");
        $this->addOption("output-path", 'o', InputOption::VALUE_REQUIRED, "");
        $this->addOption('servants', null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_REQUIRED, "");
        $this->addOption("client", null, InputOption::VALUE_NONE, "generate client class");
        $this->addArgument("tars-path", InputArgument::IS_ARRAY | InputArgument::OPTIONAL, "");
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->logger = new ConsoleLogger($output);
        if ($input->getOption('namespace')) {
            $this->generateFromArgv($input, $output);
        } else {
            $this->generateFromProject($input, $output);
        }
        return 0;
    }

    private function generateFromArgv(InputInterface $input, OutputInterface $output): void
    {
        $tarsPath = $input->getArgument('tars-path');
        if ($tarsPath === null) {
            throw new \InvalidArgumentException("Arguments tars-path is required");
        }
        $servant = !$input->getOption('client');
        $namespace = $input->getOption('namespace');
        $path = $input->getOption('output-path');
        $servants = [];
        foreach ($input->getOption('servants') as $pair) {
            list($name, $servantName) = explode("=", $pair);
            $servants[$name] = $servantName;
        }
        $generatorStrategy = new GenerateStrategyImpl(
            $namespace,
            $path,
            $namespace,
            $this->createTwig(),
            $servant
        );
        $generatorStrategy->setLogger($this->logger);
        $context = new TarsGeneratorContext($generatorStrategy, $servant, $servants);
        foreach ($tarsPath as $path) {
            $this->generate($context, $path, null);
        }
    }

    private function generate(TarsGeneratorContext $context, string $path, ?TarsGeneratorCache $cache): void
    {
        if (is_file($path)) {
            if ($cache !== null && $cache->isHit($path)) {
                return;
            }
            $this->logger->info("Processing $path");
            $generator = new TarsGenerator($context->withFile($path));
            $generator->generate();
            if ($cache !== null) {
                $cache->add($path);
            }
            return;
        }
        if (!is_dir($path)) {
            throw new \InvalidArgumentException("Directory $path does not exist");
        }
        $dirIterator = new \RecursiveDirectoryIterator($path);
        foreach (new \RecursiveIteratorIterator($dirIterator) as $file => $fileInfo) {
            if (!is_file($file) || strrpos($file, '.tars') === false) {
                continue;
            }
            $this->generate($context, $file, $cache);
        }
    }

    private function generateFromProject(InputInterface $input, OutputInterface $output): void
    {
        $projectPath = getcwd();
        if (!file_exists($projectPath . '/composer.json')) {
            throw new \RuntimeException('No composer.json find in current directory');
        }
        $composerJson = json_decode(file_get_contents($projectPath . '/composer.json'), true);
        if (empty($composerJson['autoload']['psr-4'])) {
            throw new \RuntimeException('No psr-4 autoload rule in composer.json');
        }

        $cache = new TarsGeneratorCache($projectPath . "/.tars-gen.cache");
        $autoload = $composerJson['autoload']['psr-4'];
        $psr4Namespace = trim(array_keys($autoload)[0], '\\');
        $psr4Path = rtrim(array_values($autoload)[0], '/');
        $options = $this->loadConfig($composerJson, $projectPath);

        foreach (['client', 'servant'] as $type) {
            $servant = $type === 'servant';
            $config = $options[$type] ?? [];
            $path = $config['tars_path'] ?? self::TARS_FILE_PATH . '/' . $type;
            if (is_dir($path)) {
                $generatorStrategy = new GenerateStrategyImpl(
                    $config['namespace'] ?? $psr4Namespace,
                    $config['output'] ?? $psr4Path,
                    $config['namespace'] ?? ($psr4Namespace . ($servant ? '\\servant' : '\\integration')),
                    $this->createTwig(),
                    $config['flat'] ?? $servant
                );
                $generatorStrategy->setLogger($this->logger);
                $context = new TarsGeneratorContext($generatorStrategy, $servant, $config['servants'] ?? []);
                $this->generate($context, $path, $cache);
            }
        }
    }

    private function loadConfig(array $composerJson, string $projectPath): array
    {
        $options = $composerJson['extra']['tars']['generator'] ?? [];
        $configJson = sprintf('%s/%s/config.json', $projectPath, self::TARS_FILE_PATH);
        if (file_exists($configJson)) {
            if (!empty($options)) {
                throw new \RuntimeException($configJson . " does exist, please remove extra.tars.generator from composer.json");
            }
            $options = json_decode(file_get_contents($configJson), true);
            if (!isset($options)) {
                throw new \RuntimeException($configJson . " read failed, please check json syntax");
            }
        }
        return $options;
    }

    /**
     * @return Environment
     */
    protected function createTwig(): Environment
    {
        $viewPath = __DIR__ . '/../resources/views';
        $loader = new FilesystemLoader($viewPath);
        $twig = new Environment($loader);
        $twig->addGlobal('generator_version', TarsGenerator::VERSION);
        return $twig;
    }
}