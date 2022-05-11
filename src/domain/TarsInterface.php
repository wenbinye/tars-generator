<?php

declare(strict_types=1);

namespace tars\domain;

class TarsInterface
{
    /**
     * @var TarsOperation[]
     */
    private array $operations = [];

    public function __construct(private readonly string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addOperation(TarsOperation $operation): void
    {
        $this->operations[] = $operation;
    }

    /**
     * @return TarsOperation[]
     */
    public function getOperations(): array
    {
        return $this->operations;
    }
}
