<?php

declare(strict_types=1);

namespace tars\domain;

use tars\parse\Context\VectorTypeContext;
use Webmozart\Assert\Assert;

class TarsVectorType implements TarsType
{
    /**
     * @var TarsUnionType
     */
    private TarsUnionType $itemType;

    public static function create(VectorTypeContext $vectorType): self
    {
        $type = new self();
        $typeContext = $vectorType->type();
        Assert::notNull($typeContext);
        $type->itemType = TarsUnionType::create($typeContext);

        return $type;
    }

    public function __toString(): string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return 'string';
        }

        return ((string) $this->itemType).'[]';
    }

    public function getTarsType(): string
    {
        return 'vector<'.$this->itemType->getTarsType().'>';
    }

    public function getItemType(): TarsUnionType
    {
        return $this->itemType;
    }

    public function getDeclarationType(): ?string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return 'string';
        }

        return 'array';
    }

    public function getOpenapiDeclaration(): string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return 'type: "string"';
        }

        return sprintf('type: "array", items: new OA\Items(%s)', $this->itemType->getOpenapiDeclaration());
    }

    public function getDefaultValue(): ?string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return "''";
        }

        return '[]';
    }
}
