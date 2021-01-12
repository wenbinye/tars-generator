<?php

namespace tars\domain;

class TarsParameter
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var TarsType
     */
    public $type;

    /**
     * @var bool
     */
    public $out;

    /**
     * @var bool
     */
    public $routekey;
}