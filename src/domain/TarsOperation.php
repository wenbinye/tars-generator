<?php

namespace tars\domain;

class TarsOperation
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var TarsType
     */
    public $returnType;

    /**
     * @var TarsParameter[]
     */
    public $parameters;
}