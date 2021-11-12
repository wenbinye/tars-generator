<?php

declare(strict_types=1);

namespace tars\domain;

class TarsStructField
{
    /**
     * @var int
     */
    private int $order;

    /**
     * @var bool
     */
    private bool $required;

    /**
     * @var TarsUnionType
     */
    private TarsUnionType $type;

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string|null
     */
    private ?string $defaultValue;

    /**
     * TarsStructField constructor.
     *
     * @param int           $order
     * @param bool          $required
     * @param TarsUnionType $type
     * @param string        $name
     * @param string|null   $defaultValue
     */
    public function __construct(string $name, int $order, bool $required, TarsUnionType $type, ?string $defaultValue)
    {
        $this->order = $order;
        $this->required = $required;
        $this->type = $type;
        $this->name = $name;
        $this->defaultValue = $defaultValue;
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
