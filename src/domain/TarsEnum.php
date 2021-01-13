<?php

namespace tars\domain;

class TarsEnum
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var array
     */
    public $enumerators;

    /**
     * TarsEnum constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addEnumerator(string $name, int $value): void
    {
        $this->enumerators[] = [
            'name' => $name,
            'value' => $value
        ];
    }
}
