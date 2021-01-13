<?php

namespace tars\domain;

class TarsConstContext extends AbstractContext
{
    /**
     * @var string
     */
    public $className;

    /**
     * @var TarsConst[]
     */
    public $constants;

    public function getClassName(): string
    {
        return $this->generatorContext->getGenerateStrategy()->getConstClassName();
    }

    public function addConstant(TarsConst $const): void
    {
        $this->constants[] = $const;
    }
}
   