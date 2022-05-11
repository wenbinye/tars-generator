<?php

declare(strict_types=1);

namespace tars\domain;

class TarsConst
{
    public function __construct(
        private readonly string $name,
        private readonly ?TarsPrimitiveType $type,
        private readonly string $value)
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return TarsPrimitiveType|null
     */
    public function getType(): ?TarsPrimitiveType
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
