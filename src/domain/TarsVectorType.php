<?php


namespace tars\domain;


use tars\parse\Context\VectorTypeContext;

class TarsVectorType implements TarsType
{
    /**
     * @var TarsType
     */
    private $itemType;

    public static function create(VectorTypeContext $vectorType): self
    {
        $type = new self;
        $type->itemType = TarsUnionType::create($vectorType->type());
        return $type;
    }

    public function __toString(): string
    {
        return ((string) $this->itemType) . '[]';
    }

    public function getTarsType(): string
    {
        return 'vector<' . $this->itemType->getTarsType() . '>';
    }

    public function getDeclarationType(): ?string
    {
        return 'array';
    }
}