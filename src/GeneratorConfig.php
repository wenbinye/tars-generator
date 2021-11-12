<?php

declare(strict_types=1);

namespace tars;

class GeneratorConfig
{
    private string $psr4Namespace;

    private string $psr4Path;

    private bool $flat;

    private string $namespace;

    private bool $enableOpenapi;

    private ?string $defaultValueStrategy;

    public static function fromArray(array $options): self
    {
        $config = new self();
        $config->psr4Namespace = $options['psr4_namespace'];
        $config->psr4Path = $options['output'];
        $config->namespace = $options['namespace'] ?? $options['psr4_namespace'];
        $config->flat = $options['flat'] ?? false;
        $config->enableOpenapi = $options['enable_openapi'] ?? false;
        $config->defaultValueStrategy = $options['default_value_strategy'] ?? null;

        return $config;
    }

    /**
     * @return string
     */
    public function getPsr4Namespace(): string
    {
        return $this->psr4Namespace;
    }

    /**
     * @return string
     */
    public function getPsr4Path(): string
    {
        return $this->psr4Path;
    }

    /**
     * @return bool
     */
    public function isFlat(): bool
    {
        return $this->flat;
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * @return bool
     */
    public function isEnableOpenapi(): bool
    {
        return $this->enableOpenapi;
    }

    /**
     * @return string|null
     */
    public function getDefaultValueStrategy(): ?string
    {
        return $this->defaultValueStrategy;
    }
}
