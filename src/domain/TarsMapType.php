<?php


namespace tars\domain;


use tars\parse\Context\MapTypeContext;

class TarsMapType implements TarsType
{
    /**
     * @var TarsUnionType
     */
    private $keyType;
    /**
     * @var TarsUnionType
     */
    private $valueType;

    public static function create(MapTypeContext $mapTypeContext)
    {
        $type = new self();
        $type->keyType = TarsUnionType::create($mapTypeContext->keyType);
        $type->valueType = TarsUnionType::create($mapTypeContext->valueType);
        return $type;
    }

    public function __toString(): string
    {
        return ((string)$this->valueType) . '[]';
    }

    public function getTarsType(): string
    {
        return sprintf('map<%s,%s>', $this->keyType->getTarsType(), $this->valueType->getTarsType());
    }

    public function getReturnType(): ?string
    {
        if ($this->keyType instanceof TarsPrimitiveType) {
            return 'array';
        }
        return null;
    }

}