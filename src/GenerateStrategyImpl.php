<?php


namespace tars;


use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use tars\domain\TarsConstContext;
use tars\domain\TarsEnumContext;
use tars\domain\TarsInterfaceContext;
use tars\domain\TarsStructContext;
use Twig\Environment;

class GenerateStrategyImpl implements GenerateStrategy, LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var string
     */
    private $psr4Namespace;

    /**
     * @var string
     */
    private $psr4Path;

    /**
     * @var bool
     */
    private $flat;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var bool
     */
    private $enableOpenapi;

    /**
     * @var Environment
     */
    private $twig;

    private static $TEMPLATES = [
        TarsConstContext::class => 'constant.twig',
        TarsEnumContext::class => 'enum.twig',
        TarsInterfaceContext::class => 'interface.twig',
        TarsStructContext::class => 'struct.twig'
    ];

    public function __construct(Environment $twig, array $config)
    {
        $this->twig = $twig;
        $this->psr4Namespace = $config['psr4_namespace'];
        $this->psr4Path = $config['output'];
        $this->namespace = $config['namespace'] ?? $config['psr4_namespace'];
        $this->flat = $config['flat'] ?? false;
        $this->enableOpenapi = $config['enable_openapi'] ?? false;
    }

    public function getConstClassName(): string
    {
        return 'Constants';
    }

    public function getEnumClassName(string $enumName): string
    {
        return $enumName;
    }

    public function getStructClassName(string $structName): string
    {
        return $structName;
    }

    public function getInterfaceClassName($interfaceName): string
    {
        return $interfaceName . 'Servant';
    }

    public function getNamespace(string $moduleName): string
    {
        return $this->namespace . ($this->flat ? '' : '\\' . $this->moduleToNamespace($moduleName));
    }

    private function moduleToNamespace(string $moduleName): string
    {
        return str_replace('_', '\\', $moduleName);
    }

    public function generate(domain\AbstractContext $context): void
    {
        $code = $this->twig->render($this->getTemplate($context), $this->extractContext($context));
        $outputFile = $this->getOutputFile($context);
        file_put_contents($outputFile, $code);
        $this->logger && $this->logger->info("$outputFile was created");
    }

    private function getTemplate(domain\AbstractContext $context): string
    {
        $template = self::$TEMPLATES[get_class($context)] ?? null;
        if (!isset($template)) {
            throw new \InvalidArgumentException("Unknown context type " . get_class($context));
        }
        return $template;
    }

    private function extractContext(domain\AbstractContext $context): array
    {
        $vars = get_object_vars($context);
        foreach (get_class_methods($context) as $method) {
            if (strpos($method, 'get') === 0) {
                $vars[lcfirst(substr($method, 3))] = $context->$method();
            }
        }
        $vars['enable_openapi'] = $this->enableOpenapi;
        return $vars;
    }

    private function getOutputFile(domain\AbstractContext $context): string
    {
        $className = $context->getNamespace() . '\\' . $context->getClassName();
        if (strpos($className, $this->psr4Namespace) !== 0) {
            throw new \InvalidArgumentException("namespace not match, expected namespace {$this->psr4Namespace}, got class {$className}");
        }
        $relativeName = ltrim(substr($className, strlen($this->psr4Namespace)), '\\');
        $file = $this->psr4Path . '/' . str_replace('\\', '/', $relativeName) . ".php";
        $dir = dirname($file);
        if (!is_dir($dir) && !mkdir($dir, 0777, true) && !is_dir($dir)) {
            throw new \RuntimeException("Cannot create directory $dir");
        }
        return $file;
    }
}