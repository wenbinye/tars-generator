<?php

declare(strict_types=1);

namespace tars\domain;

class TarsStruct
{
    /**
     * @var TarsStructField[]
     */
    private array $fields = [];

    public function __construct(private readonly string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addField(TarsStructField $field): void
    {
        $this->fields[] = $field;
    }

    /**
     * @return TarsStructField[]
     */
    public function getFields(): array
    {
        return $this->fields;
    }
}
