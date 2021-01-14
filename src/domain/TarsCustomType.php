<?php


namespace tars\domain;


use tars\parse\Context\CustomTypeContext;

class TarsCustomType implements TarsType
{
    /**
     * @var string
     */
    private $name;

    public static function create(CustomTypeContext $customType): self
    {
        if ($customType->moduleName() !== null) {
            throw new \InvalidArgumentException("暂时不支持引用其他 module 类型");
        }
        $type = new self();
        $type->name = $customType->Identifier()->getText();
        return $type;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getTarsType(): string
    {
        return $this->name;
    }

    public function getDeclarationType(): ?string
    {
        return $this->name;
    }
}