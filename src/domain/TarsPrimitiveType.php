<?php


namespace tars\domain;


use tars\parse\Context\PrimitiveTypeContext;

class TarsPrimitiveType
{
    private static $TYPES = [
        "void","bool","byte","short","int","long","float","double","string"
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

    public function __toString()
    {
     return $this->name;
    }

    public static function create(PrimitiveTypeContext $type): self
    {
        foreach (self::$TYPES as $type) {
            $method = $type . 'Type';
            if ($type->$method() !== null) {
                return new self($type);
            }
        }
        throw new \InvalidArgumentException("unknown primitive type");
    }
}