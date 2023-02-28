<?php

declare(strict_types=1);

namespace tars;

class GeneratorConfig
{
    public function __construct(
        private readonly string $psr4Namespace,
        private readonly string $psr4Path,
        private readonly bool $flat,
        private readonly string $namespace,
        private readonly bool $enableOpenapi,
        private readonly string $protocol,
        private readonly ?string $defaultValueStrategy,
    ) {
    }

    public static function fromArray(array $options): self
    {
        return new self(
            psr4Namespace: $options['psr4_namespace'],
            psr4Path: $options['output'],
            flat: $options['flat'] ?? false,
            namespace: $options['namespace'] ?? $options['psr4_namespace'],
            enableOpenapi: $options['enable_openapi'] ?? false,
            protocol: $options['protocol'] ?? 'tars',
            defaultValueStrategy: $options['default_value_strategy'] ?? null,
        );
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
     * @return string
     */
    public function getProtocol(): string
    {
        return $this->protocol;
    }

    /**
     * @return string|null
     */
    public function getDefaultValueStrategy(): ?string
    {
        return $this->defaultValueStrategy;
    }
}
