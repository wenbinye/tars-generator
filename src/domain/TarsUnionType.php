<?php

declare(strict_types=1);

namespace tars\domain;

use InvalidArgumentException;
use tars\parse\Context\TypeContext;
use Webmozart\Assert\Assert;

class TarsUnionType implements TarsType
{
    /**
     * @var TarsPrimitiveType|null
     */
    private ?TarsPrimitiveType $primitiveType = null;

    /**
     * @var TarsCustomType|null
     */
    private ?TarsCustomType $customType = null;

    /**
     * @var TarsMapType|null
     */
    private ?TarsMapType $mapType = null;

    /**
     * @var TarsVectorType|null
     */
    private ?TarsVectorType $vectorType = null;

    public function __construct(TarsType $type)
    {
        if ($type instanceof TarsPrimitiveType) {
            $this->primitiveType = $type;
        } elseif ($type instanceof TarsCustomType) {
            $this->customType = $type;
        } elseif ($type instanceof TarsMapType) {
            $this->mapType = $type;
        } elseif ($type instanceof TarsVectorType) {
            $this->vectorType = $type;
        }
    }

    public static function create(TypeContext $type): self
    {
        if (null !== $type->primitiveType()) {
            return new self(TarsPrimitiveType::create($type->primitiveType()));
        }
        if (null !== $type->customType()) {
            return new self(TarsCustomType::create($type->customType()));
        }
        if (null !== $type->vectorType()) {
            return new self(TarsVectorType::create($type->vectorType()));
        }
        if (null !== $type->mapType()) {
            return new self(TarsMapType::create($type->mapType()));
        }

        throw new InvalidArgumentException('Invalid type');
    }

    private function getType(): TarsType
    {
        if (null !== $this->primitiveType) {
            return $this->primitiveType;
        }
        if (null !== $this->customType) {
            return $this->customType;
        }
        if (null !== $this->mapType) {
            return $this->mapType;
        }
        if (null !== $this->vectorType) {
            return $this->vectorType;
        }
        throw new InvalidArgumentException('Unknown type');
    }

    public function isPrimitiveType(): bool
    {
        return null !== $this->primitiveType;
    }

    public function asPrimitiveType(): TarsPrimitiveType
    {
        Assert::notNull($this->primitiveType);

        return $this->primitiveType;
    }

    public function isCustomType(): bool
    {
        return null !== $this->customType;
    }

    public function asCustomType(): TarsCustomType
    {
        Assert::notNull($this->customType);

        return $this->customType;
    }

    public function isMapType(): bool
    {
        return null !== $this->mapType;
    }

    public function asMapType(): TarsMapType
    {
        Assert::notNull($this->mapType);

        return $this->mapType;
    }

    public function isVectorType(): bool
    {
        return null !== $this->vectorType;
    }

    public function asVectorType(): TarsVectorType
    {
        Assert::notNull($this->vectorType);

        return $this->vectorType;
    }

    public function __toString(): string
    {
        return (string) $this->getType();
    }

    public function getTarsType(): string
    {
        return $this->getType()->getTarsType();
    }

    public function getDeclarationType(): ?string
    {
        return $this->getType()->getDeclarationType();
    }

    public function getDocBlockType(): ?string
    {
        return $this->getType()->getDocBlockType();
    }

    public function getOpenapiDeclaration(): string
    {
        return $this->getType()->getOpenapiDeclaration();
    }

    public function getDefaultValue(): ?string
    {
        return $this->getType()->getDefaultValue();
    }
}
