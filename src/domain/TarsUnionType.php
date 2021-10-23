<?php

namespace tars\domain;

use tars\parse\Context\TypeContext;

class TarsUnionType implements TarsType
{
    /**
     * @var TarsPrimitiveType|null
     */
    private $primitiveType;

    /**
     * @var TarsCustomType|null
     */
    private $customType;

    /**
     * @var TarsMapType|null
     */
    private $mapType;

    /**
     * @var TarsVectorType|null
     */
    private $vectorType;

    public static function create(TypeContext $type): self
    {
        $ret = new self();
        if ($type->primitiveType() !== null) {
            $ret->primitiveType = TarsPrimitiveType::create($type->primitiveType());
            return $ret;
        }
        if ($type->customType() !== null) {
            $ret->customType = TarsCustomType::create($type->customType());
            return $ret;
        }
        if ($type->vectorType() !== null) {
            $ret->vectorType = TarsVectorType::create($type->vectorType());
            return $ret;
        }
        if ($type->mapType() !== null) {
            $ret->mapType = TarsMapType::create($type->mapType());
            return $ret;
        }

        throw new \InvalidArgumentException("Invalid type");
    }

    private function getType(): TarsType
    {
        if ($this->primitiveType !== null) {
            return $this->primitiveType;
        }
        if ($this->customType !== null) {
            return $this->customType;
        }
        if ($this->mapType !== null) {
            return $this->mapType;
        }
        if ($this->vectorType !== null) {
            return $this->vectorType;
        }
        throw new \InvalidArgumentException("Unknown type");
    }

    public function isPrimitiveType(): bool
    {
        return $this->primitiveType !== null;
    }

    public function asPrimitiveType(): TarsPrimitiveType
    {
        if (!$this->isPrimitiveType()) {
            throw new \InvalidArgumentException("not primitive type");
        }
        return $this->primitiveType;
    }

    public function isCustomType(): bool
    {
        return $this->customType !== null;
    }

    public function asCustomType(): TarsCustomType
    {
        if (!$this->isCustomType()) {
            throw new \InvalidArgumentException("not custom type");
        }
        return $this->customType;
    }

    public function isMapType(): bool
    {
        return $this->mapType !== null;
    }

    public function asMapType(): TarsMapType
    {
        if (!$this->isMapType()) {
            throw new \InvalidArgumentException("not map type");
        }
        return $this->mapType;
    }

    public function isVectorType(): bool
    {
        return $this->vectorType !== null;
    }

    public function asVectorType(): TarsVectorType
    {
        if (!$this->isVectorType()) {
            throw new \InvalidArgumentException("not vector type");
        }
        return $this->vectorType;
    }

    public function __toString(): string
    {
        return (string)$this->getType();
    }

    public function getTarsType(): string
    {
        return $this->getType()->getTarsType();
    }

    public function getDeclarationType(): ?string
    {
        return $this->getType()->getDeclarationType();
    }

    public function getOpenapiDeclaration(): string
    {
        return $this->getType()->getOpenapiDeclaration();
    }
}