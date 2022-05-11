<?php

declare(strict_types=1);

namespace tars\domain;

use tars\TarsGeneratorContext;

abstract class AbstractContext
{
    public function __construct(
        protected readonly string $moduleName,
        protected readonly TarsGeneratorContext $generatorContext)
    {
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
