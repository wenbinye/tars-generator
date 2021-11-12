<?php

declare(strict_types=1);

namespace tars\domain;

class TarsConstContext extends AbstractContext
{
    /**
     * @var TarsConst[]
     */
    private array $constants = [];

    public function getClassName(): string
    {
        return $this->generatorContext->getGenerateStrategy()->getConstClassName();
    }

    public function addConstant(TarsConst $const): void
    {
        $this->constants[] = $const;
    }

    /**
     * @return TarsConst[]
     */
    public function getConstants(): array
    {
        return $this->constants;
    }
}
