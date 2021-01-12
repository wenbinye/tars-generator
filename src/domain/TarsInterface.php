<?php

namespace tars\domain;

class TarsInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var TarsOperation[]
     */
    public $operations;
}