<?php

declare(strict_types=1);

namespace tars;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use RuntimeException;

class TarsGeneratorContext
{
    /**
     * @var string
     */
    private string $file;

    /**
     * @var CommonTokenStream
     */
    private CommonTokenStream $tokenStream;

    private static ?self $INSTANCE = null;

    /**
     * @param GenerateStrategy $generateStrategy
     * @param bool             $servant
     * @param string[]         $servants
     */
    public function __construct(
        private readonly GenerateStrategy $generateStrategy,
        private readonly bool $servant,
        private readonly array $servants = [])
    {
    }

    public static function getInstance(): self
    {
        if (null === self::$INSTANCE) {
            throw new RuntimeException('GeneratorConfig not initialized');
        }

        return self::$INSTANCE;
    }

    public static function setInstance(self $context): void
    {
        self::$INSTANCE = $context;
    }

    /**
     * @return array
     */
    public function getServants(): array
    {
        return $this->servants;
    }

    /**
     * @return bool
     */
    public function isServant(): bool
    {
        return $this->servant;
    }

    /**
     * @return string
     */
    public function getFile(): string
    {
        return $this->file;
    }

    public function withFile(string $file): self
    {
        $new = clone $this;
        $new->file = $file;

        return $new;
    }

    /**
     * @return CommonTokenStream
     */
    public function getTokenStream(): CommonTokenStream
    {
        return $this->tokenStream;
    }

    public function withTokenStream(CommonTokenStream $tokenStream): self
    {
        $new = clone $this;
        $new->tokenStream = $tokenStream;

        return $new;
    }

    public function getModuleNamespace(string $moduleName): string
    {
        return $this->generateStrategy->getNamespace($moduleName);
    }

    /**
     * @return GenerateStrategy
     */
    public function getGenerateStrategy(): GenerateStrategy
    {
        return $this->generateStrategy;
    }

    public function getProtocol(): string
    {
        return $this->generateStrategy->getConfig()->getProtocol();
    }

    public function getServantName(string $moduleName, string $interfaceName): string
    {
        return $this->servants[$moduleName.'.'.$interfaceName]
            ?? $this->servants[$interfaceName]
            ?? $interfaceName.'Obj';
    }
}
