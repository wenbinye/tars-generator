<?php

namespace tars\domain;

class TarsEnumContext extends AbstractContext
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $className;

    /**
     * @var TarsEnum
     */
    public $enum;
}
