<?php

namespace tars\domain;

use tars\TarsGeneratorContext;

abstract class AbstractContext
{
    /**
     * @var string
     */
    protected $moduleName;

    /**
     * @var TarsGeneratorContext
     */
    protected $generatorContext;

    /**
     * AbstractContext constructor.
     * @param string $moduleName
     * @param TarsGeneratorContext $generatorContext
     */
    public function __construct(string $moduleName, TarsGeneratorContext $generatorContext)
    {
        $this->moduleName = $moduleName;
        $this->generatorContext = $generatorContext;
    }

    public function getNamespace(): string
    {
        return $this->generatorContext->getModuleNamespace($this->moduleName);
    }

    public function generate(): void
    {
        $this->generatorContext->getGenerateStrategy()->generate($this);
    }

    /**
     * @return string
     */
    public function getModuleName(): string
    {
        return $this->moduleName;
    }

    /**
     * @return TarsGeneratorContext
     */
    public function getGeneratorContext(): TarsGeneratorContext
    {
        return $this->generatorContext;
    }

    abstract public function getClassName(): string;
}
