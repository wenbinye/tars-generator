<?php

namespace tars\domain;

class TarsInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var TarsOperation[]
     */
    private $operations;

    /**
     * TarsInterface constructor.
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