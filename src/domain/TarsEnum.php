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
    private $enumerators;

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
        $this->ordinal = ($value ?? ($this->ordinal + 1));
        $this->enumerators[] = [
            'name' => $name,
            'value' => $this->ordinal
        ];
    }

    /**
     * @return array
     */
    public function getEnumerators(): array
    {
        return $this->enumerators;
    }
}
