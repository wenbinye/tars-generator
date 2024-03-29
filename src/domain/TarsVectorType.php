<?php


namespace tars\domain;


use tars\parse\Context\VectorTypeContext;

class TarsVectorType implements TarsType
{
    /**
     * @var TarsUnionType
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
        if ($this->itemType->getTarsType() === 'byte') {
            return 'string';
        }
        return ((string) $this->itemType) . '[]';
    }

    public function getTarsType(): string
    {
        return 'vector<' . $this->itemType->getTarsType() . '>';
    }

    public function getItemType(): TarsUnionType
    {
        return $this->itemType;
    }

    public function getDeclarationType(): ?string
    {
        if ($this->itemType->getTarsType() === 'byte') {
            return 'string';
        }
        return 'array';
    }

    public function getOpenapiDeclaration(): string
    {
        if ($this->itemType->getTarsType() === 'byte') {
            return 'type="string"';
        }
        return sprintf('type="array", @OA\Items(%s)', $this->itemType->getOpenapiDeclaration());
    }
}
