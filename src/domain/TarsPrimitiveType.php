<?php


namespace tars\domain;


use tars\parse\Context\PrimitiveTypeContext;

class TarsPrimitiveType implements TarsType
{
    private static $TYPES = [
        "void", "bool", "byte", "short", "int", "long", "float", "double", "string"
    ];

    /**
     * @var string
     */
    private $name;

    /**
     * TarsPrimitiveType constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public static function create(PrimitiveTypeContext $type): self
    {
        foreach (self::$TYPES as $typeName) {
            $method = $typeName . 'Type';
            if ($type->$method() !== null) {
                return new self($typeName);
            }
        }
        throw new \InvalidArgumentException("unknown primitive type");
    }

    public function getTarsType(): string
    {
        return $this->name;
    }

    public function getReturnType(): ?string
    {
        return $this->name;
    }
}