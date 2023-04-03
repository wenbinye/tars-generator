<?php

declare(strict_types=1);

namespace tars;

use InvalidArgumentException;
use Psr\Log\LoggerAwareInterface;
use Psr\Log\LoggerAwareTrait;
use tars\domain\TarsConstContext;
use tars\domain\TarsEnumContext;
use tars\domain\TarsInterfaceContext;
use tars\domain\TarsStructContext;
use Twig\Environment;
use Twig\Error\Error;

abstract class AbstractGenerateStrategy implements GenerateStrategy, LoggerAwareInterface
{
    use LoggerAwareTrait;

    /**
     * @var string[]
     */
    private static array $TEMPLATES = [
        TarsConstContext::class => 'constant.twig',
        TarsEnumContext::class => 'enum.twig',
        TarsInterfaceContext::class => 'interface.twig',
        TarsStructContext::class => 'struct.twig',
    ];

    public function __construct(private readonly Environment $twig, private readonly GeneratorConfig $config)
    {
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

    public function getInterfaceClassName(string $interfaceName): string
    {
        return $interfaceName.'Servant';
    }

    public function getNamespace(string $moduleName): string
    {
        return $this->config->getNamespace().($this->config->isFlat() ? '' : '\\'.$this->moduleToNamespace($moduleName));
    }

    protected function moduleToNamespace(string $moduleName): string
    {
        return str_replace('_', '\\', $moduleName);
    }

    /**
     * @throws Error
     */
    public function generate(domain\AbstractContext $context): void
    {
        $code = $this->twig->render($this->config->getProtocol().'/'.$this->getTemplate($context), $this->extractContext($context));
        $outputFile = $this->getOutputFile($context);
        $this->write($outputFile, $code);
        $this->logger?->info("$outputFile was created");
    }

    public function getConfig(): GeneratorConfig
    {
        return $this->config;
    }

    abstract protected function write(string $file, string $code): void;

    protected function getTemplate(domain\AbstractContext $context): string
    {
        $template = self::$TEMPLATES[get_class($context)] ?? null;
        if (!isset($template)) {
            throw new InvalidArgumentException('Unknown context type '.get_class($context));
        }

        return $template;
    }

    protected function extractContext(domain\AbstractContext $context): array
    {
        $vars = get_object_vars($context);
        foreach (get_class_methods($context) as $method) {
            if (str_starts_with($method, 'get')) {
                $vars[lcfirst(substr($method, 3))] = $context->$method();
            }
        }
        $vars['enable_openapi'] = $this->config->isEnableOpenapi();
        $vars['strict_type'] = $this->config->isStrictType();
        $vars['use_php_enum'] = $this->config->isUsePhpEnum();
        $vars['generator_config'] = $this->config;

        return $vars;
    }

    protected function getOutputFile(domain\AbstractContext $context): string
    {
        $className = $context->getNamespace().'\\'.$context->getClassName();
        if (!str_starts_with($className, $this->config->getPsr4Namespace())) {
            throw new InvalidArgumentException("namespace not match, expected namespace {$this->config->getPsr4Namespace()}, got class $className");
        }
        $relativeName = ltrim(substr($className, strlen($this->config->getPsr4Namespace())), '\\');

        return $this->config->getPsr4Path().'/'.str_replace('\\', '/', $relativeName).'.php';
    }
}
