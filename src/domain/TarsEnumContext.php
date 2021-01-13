<?php

namespace tars\domain;

class TarsEnumContext extends AbstractContext
{
    /**
     * @var TarsEnum
     */
    public $enum;

    public function setEnum(TarsEnum $enum): void
    {
        $this->enum = $enum;
    }
}