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

    public function __toString(): string
    {
        return (string)$this->getType();
    }

    public function getTarsType(): string
    {
        return $this->getType()->getTarsType();
    }

    public function getReturnType(): ?string
    {
        return $this->getType()->getReturnType();
    }
}