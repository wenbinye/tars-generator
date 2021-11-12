<?php

declare(strict_types=1);

namespace tars\domain;

class TarsEnumContext extends AbstractContext
{
    /**
     * @var TarsEnum
     */
    private TarsEnum $enum;

    public function setEnum(TarsEnum $enum): void
    {
        $this->enum = $enum;
    }

    /**
     * @return TarsEnum
     */
    public function getEnum(): TarsEnum
    {
        return $this->enum;
    }

    public function getClassName(): string
    {
        return $this->generatorContext->getGenerateStrategy()->getEnumClassName($this->enum->getName());
    }
}
