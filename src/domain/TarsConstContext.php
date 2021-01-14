<?php

namespace tars\domain;

class TarsConstContext extends AbstractContext
{
    /**
     * @var TarsConst[]
     */
    private $constants = [];

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
   