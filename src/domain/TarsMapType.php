<?php

declare(strict_types=1);

namespace tars\domain;

use tars\parse\Context\MapTypeContext;
use Webmozart\Assert\Assert;

class TarsMapType implements TarsType
{
    /**
     * @var TarsUnionType
     */
    private TarsUnionType $keyType;
    /**
     * @var TarsUnionType
     */
    private TarsUnionType $valueType;

    public static function create(MapTypeContext $mapTypeContext): self
    {
        $type = new self();
        Assert::notNull($mapTypeContext->keyType);
        Assert::notNull($mapTypeContext->valueType);
        $type->keyType = TarsUnionType::create($mapTypeContext->keyType);
        $type->valueType = TarsUnionType::create($mapTypeContext->valueType);

        return $type;
    }

    public function __toString(): string
    {
        if ($this->keyType->isPrimitiveType()) {
            return ((string) $this->valueType).'[]';
        }

        return '\\kuiper\\tars\\type\\StructMap';
    }

    public function getTarsType(): string
    {
        return sprintf('map<%s,%s>', $this->keyType->getTarsType(), $this->valueType->getTarsType());
    }

    public function getDeclarationType(): ?string
    {
        if ($this->keyType->isPrimitiveType()) {
            return 'array';
        }

        return null;
    }

    public function getDocBlockType(): ?string
    {
        return sprintf('array<%s, %s>', $this->keyType->getDocBlockType(), $this->valueType->getDocBlockType());
    }

    public function getOpenapiDeclaration(): string
    {
        return 'type: "object"';
    }

    public function getDefaultValue(): ?string
    {
        if ($this->keyType->isPrimitiveType()) {
            return '[]';
        }

        return 'null';
    }
}
