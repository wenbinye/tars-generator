<?php

declare(strict_types=1);

namespace tars;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\DiagnosticErrorListener;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\Tree\ParseTreeWalker;
use InvalidArgumentException;
use JsonException;
use Psr\Log\LoggerInterface;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use RuntimeException;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Symfony\Component\Console\Output\OutputInterface;
use tars\parse\TarsLexer;
use tars\parse\TarsParser;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TarsGenerateCommand extends Command
{
    private const TARS_FILE_PATH = 'tars';
    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    protected function configure(): void
    {
        $this->setName('tars:generate');
        $this->addOption('protocol', null, InputOption::VALUE_REQUIRED, 'rpc protocol, support tars and jsonrpc', 'tars');
        $this->addOption('namespace', null, InputOption::VALUE_REQUIRED, 'php class namespace');
        $this->addOption('output-path', 'o', InputOption::VALUE_REQUIRED, 'output path');
        $this->addOption('servants', null, InputOption::VALUE_IS_ARRAY | InputOption::VALUE_REQUIRED, 'servant names');
        $this->addOption('client', null, InputOption::VALUE_NONE, 'generate client class');
        $this->addOption('enable-openapi', null, InputOption::VALUE_NONE, 'generate openapi annotation');
        $this->addArgument('tars-path', InputArgument::IS_ARRAY | InputArgument::OPTIONAL, 'tars file path');
    }

    /**
     * @throws JsonException
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->logger = new ConsoleLogger($output);
        if (true === $input->getOption('namespace')) {
            $this->generateFromArgv($input, $output);
        } else {
            $this->generateFromProject($input, $output);
        }

        return 0;
    }

    private function generateFromArgv(InputInterface $input, OutputInterface $output): void
    {
        $tarsPath = $input->getArgument('tars-path');
        if (null === $tarsPath) {
            throw new InvalidArgumentException('Arguments tars-path is required');
        }
        $servant = true !== $input->getOption('client');
        $namespace = $input->getOption('namespace');
        $outputPath = $input->getOption('output-path');
        $servants = [];
        foreach ($input->getOption('servants') as $pair) {
            list($name, $servantName) = explode('=', $pair);
            $servants[$name] = $servantName;
        }
        $generatorStrategy = new FileGenerateStrategy($this->createTwig(), GeneratorConfig::fromArray([
            'namespace' => $namespace,
            'psr4_namespace' => $namespace,
            'output' => $outputPath,
            'flat' => $servant,
            'protocol' => $input->getOption('protocol'),
        ]));
        $generatorStrategy->setLogger($this->logger);
        $context = new TarsGeneratorContext($generatorStrategy, $servant, $servants);
        foreach ($tarsPath as $path) {
            $this->generate($context, $path, null);
        }
    }

    /**
     * @throws JsonException
     */
    private function generateFromProject(InputInterface $input, OutputInterface $output): void
    {
        $projectPath = getcwd();
        if (false === $projectPath) {
            throw new RuntimeException('Cannot get current directory');
        }
        if (!file_exists($projectPath.'/composer.json')) {
            throw new RuntimeException('No composer.json find in current directory');
        }
        $content = file_get_contents($projectPath.'/composer.json');
        if (false === $content) {
            throw new RuntimeException('Cannot read composer.json');
        }
        try {
            $composerJson = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new RuntimeException("Fail to load $projectPath/composer.json because of ".$e);
        }
        if (empty($composerJson['autoload']['psr-4'])) {
            throw new RuntimeException('No psr-4 autoload rule in composer.json');
        }

        $cache = new TarsGeneratorCache($projectPath.'/.tars-gen.cache');
        $this->mergeServantFiles($projectPath, $cache);
        $autoload = $composerJson['autoload']['psr-4'];
        $psr4Namespace = trim((string) array_keys($autoload)[0], '\\');
        $psr4Path = rtrim((string) array_values($autoload)[0], '/');
        $options = $this->loadConfig($projectPath);

        foreach (['client', 'servant', 'jsonrpc'] as $type) {
            $config = $options[$type] ?? [];
            if (isset($config[0])) {
                foreach ($config as $oneConfig) {
                    $this->generateOne($type, $oneConfig, $cache, $psr4Namespace, $psr4Path, $output);
                }
            } else {
                $this->generateOne($type, $config, $cache, $psr4Namespace, $psr4Path, $output);
            }
        }
    }

    /**
     * @throws JsonException
     */
    private function generate(TarsGeneratorContext $context, string $path, ?TarsGeneratorCache $cache): void
    {
        if (is_file($path)) {
            if (null !== $cache && $cache->isHit($path)) {
                return;
            }
            $this->logger->info("Processing $path");
            $generator = new TarsGenerator($context->withFile($path));
            $generator->generate();
            $cache?->add($path);

            return;
        }
        if (!is_dir($path)) {
            throw new InvalidArgumentException("Directory $path does not exist");
        }
        $dirIterator = new RecursiveDirectoryIterator($path);
        foreach (new RecursiveIteratorIterator($dirIterator) as $file => $fileInfo) {
            if (!is_file($file) || false === strrpos($file, '.tars')) {
                continue;
            }
            $this->generate($context, $file, $cache);
        }
    }

    /**
     * @throws JsonException
     */
    private function generateOne(string $type, array $config, TarsGeneratorCache $cache, string $psr4Namespace, string $psr4Path, OutputInterface $output): void
    {
        $servant = 'servant' === $type;
        $path = $config['tars_path'] ?? self::TARS_FILE_PATH.'/'.$type;
        if ($path === $type && !is_dir($path)) {
            $path = self::TARS_FILE_PATH.'/'.$type;
        }
        if (!is_dir($path)) {
            if (isset($config[$type])) {
                $output->writeln("<error>tars definition file path '$path' for $type does not exist</error>");
            }

            return;
        }
        $config['psr4_namespace'] = $config['namespace'] ?? $psr4Namespace;
        if (!isset($config['namespace'])) {
            $config['namespace'] = ($psr4Namespace.($servant ? '\\servant' : '\\integration'));
        }
        if (!isset($config['output'])) {
            $config['output'] = $psr4Path;
        }
        if (!isset($config['flat'])) {
            $config['flat'] = $servant;
        }
        if (!isset($config['protocol'])) {
            $config['protocol'] = 'jsonrpc' === $type ? 'jsonrpc' : 'tars';
        }
        $generatorStrategy = new FileGenerateStrategy($this->createTwig(), GeneratorConfig::fromArray($config));
        $generatorStrategy->setLogger($this->logger);
        $context = new TarsGeneratorContext($generatorStrategy, $servant, $config['servants'] ?? []);
        $this->generate($context, $path, $cache);
    }

    /**
     * @throws JsonException
     */
    private function loadConfig(string $projectPath): array
    {
        $options = [];
        $configJson = sprintf('%s/%s/config.json', $projectPath, self::TARS_FILE_PATH);
        if (file_exists($configJson)) {
            $options = json_decode(file_get_contents($configJson), true, 512, JSON_THROW_ON_ERROR);
        }

        return $options;
    }

    /**
     * @return Environment
     */
    protected function createTwig(): Environment
    {
        $viewPath = __DIR__.'/../resources/views';
        $loader = new FilesystemLoader($viewPath);
        $twig = new Environment($loader);
        $twig->addGlobal('generator_version', TarsGenerator::VERSION);

        return $twig;
    }

    /**
     * @throws JsonException
     */
    private function mergeServantFiles(string $projectPath, TarsGeneratorCache $cache): void
    {
        $includeFiles = glob($projectPath.'/'.self::TARS_FILE_PATH.'/servant/includes/*.tars');
        if (!empty($includeFiles)) {
            $cached = true;
            foreach ($includeFiles as $file) {
                if (!$cache->isHit($file)) {
                    $cached = false;
                    break;
                }
            }
            if ($cached) {
                return;
            }
            $code = implode("\n", array_map('file_get_contents', $includeFiles));
            $input = InputStream::fromString($code);
            $lexer = new TarsLexer($input);
            $tokens = new CommonTokenStream($lexer);
            $parser = new TarsParser($tokens);
            $parser->addErrorListener(new DiagnosticErrorListener());
            $parser->setBuildParseTree(true);
            $tree = $parser->root();

            $listener = new TarsMergeListener();
            ParseTreeWalker::default()->walk($listener, $tree);
            foreach ($listener->getModules() as $module) {
                file_put_contents($projectPath.'/'.self::TARS_FILE_PATH.'/servant/'.$module->getName().'.tars', (string) $module);
            }
            foreach ($includeFiles as $file) {
                $cache->add($file);
            }
        }
    }
}
