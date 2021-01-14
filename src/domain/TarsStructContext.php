<?php

namespace tars\domain;

class TarsStructContext extends AbstractContext
{
    /**
     * @var TarsStruct
     */
    private $struct;

    public function getClassName(): string
    {
        return $this->generatorContext->getGenerateStrategy()->getStructClassName($this->struct->getName());
    }

    /**
     * @param TarsStruct $struct
     */
    public function setStruct(TarsStruct $struct): void
    {
        $this->struct = $struct;
    }

    /**
     * @return TarsStruct
     */
    public function getStruct(): TarsStruct
    {
        return $this->struct;
    }
}