<?php

namespace tars;

use Antlr\Antlr4\Runtime\CommonTokenStream;

class TarsGeneratorContext
{
    /**
     * @var GenerateStrategy
     */
    private $generateStrategy;

    /**
     * @var string
     */
    private $file;

    /**
     * @var CommonTokenStream
     */
    private $tokenStream;

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
}