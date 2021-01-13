<?php

namespace tars\domain;

class TarsConst
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var TarsPrimitiveType|null
     */
    public $type;

    /**
     * @var string
     */
    public $value;

    /**
     * TarsConst constructor.
     * @param string $name
     * @param string $type
     * @param string $value
     */
    public function __construct(string $name, ?TarsPrimitiveType $type, string $value)
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }
}
