<?php

namespace tars\domain;

class TarsInterfaceContext extends AbstractContext
{
    /**
     * @var bool
     */
    public $servant;

    /**
     * @var string
     */
    public $servantName;

    /**
     * @var string
     */
    public $className;

    /**
     * @var TarsInterface
     */
    public $interface;
}
