<?php

namespace tars\domain;

class TarsStructField
{
    /**
     * @var int
     */
    public $order;

    /**
     * @var bool
     */
    public $required;

    /**
     * @var TarsType
     */
    public $type;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string|null
     */
    public $defaultValue;
}