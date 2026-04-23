<?php

declare(strict_types=1);

namespace tars\domain;

class TarsStruct
{
    /**
     * @var TarsStructField[]
     */
    private array $fields = [];

    private ?string $description = null;

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

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function hasDescription(): bool
    {
        return null !== $this->description;
    }
}
