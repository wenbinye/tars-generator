<?php

declare(strict_types=1);

namespace tars\domain;

class TarsStruct
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var TarsStructField[]
     */
    private array $fields = [];

    /**
     * TarsStruct constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
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
