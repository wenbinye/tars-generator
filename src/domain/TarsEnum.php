<?php

declare(strict_types=1);

namespace tars\domain;

class TarsEnum
{
    /**
     * @var array
     */
    private array $enumerators = [];

    /**
     * @var int
     */
    private int $ordinal = 0;

    public function __construct(private readonly string $name)
    {
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
            'value' => $value,
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
