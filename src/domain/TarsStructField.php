<?php

declare(strict_types=1);

namespace tars\domain;

class TarsStructField
{
    public function __construct(
        private readonly string $name,
        private readonly int $order,
        private readonly bool $required,
        private readonly TarsUnionType $type,
        private readonly ?string $defaultValue)
    {
    }

    /**
     * @return int
     */
    public function getOrder(): int
    {
        return $this->order;
    }

    /**
     * @return bool
     */
    public function isRequired(): bool
    {
        return $this->required;
    }

    /**
     * @return TarsUnionType
     */
    public function getType(): TarsUnionType
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }

    public function hasDefaultValue(): bool
    {
        return isset($this->defaultValue);
    }

    public function getOpenapiDeclaration(): string
    {
        return $this->type->getOpenapiDeclaration();
    }
}
