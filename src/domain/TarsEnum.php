<?php

namespace tars\domain;

class TarsEnum
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $enumerators = [];

    /**
     * @var int
     */
    private $ordinal = 0;

    /**
     * TarsEnum constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function addEnumerator(string $name, ?int $value): void
    {
        $value = $value ?? $this->ordinal;
        $this->enumerators[] = [
            'name' => $name,
            'value' => $value
        ];
        $this->ordinal = $value + 1;
    }

    /**
     * @return array
     */
    public function getEnumerators(): array
    {
        return $this->enumerators;
    }
}
