<?php

declare(strict_types=1);

namespace tars\domain;

use tars\parse\Context\PrimitiveTypeContext;

class TarsPrimitiveType implements TarsType
{
    private static array $TYPES = [
        'void', 'bool', 'byte', 'short', 'int', 'long', 'float', 'double', 'string',
    ];

    private static array $TYPE_MAP = [
        'void' => 'void',
        'bool' => 'bool',
        'byte' => 'int',
        'short' => 'int',
        'int' => 'int',
        'long' => 'int',
        'float' => 'float',
        'double' => 'float',
        'string' => 'string',
    ];

    /**
     * @var string[]
     */
    private static array $OPENAPI_TYPE = [
        'bool' => 'type="boolean"',
        'byte' => 'type="string", format="byte"',
        'int' => 'type="integer", format="int32"',
        'short' => 'type="integer", format="int32"',
        'long' => 'type="integer", format="int64"',
        'double' => 'type="number", format="float"',
        'float' => 'type="number", format="double"',
        'string' => 'type="string"',
    ];

    private const DEFAULT_VALUE = [
        'bool' => 'false',
        'int' => '0',
        'short' => '0',
        'long' => '0',
        'double' => '0',
        'float' => '0',
        'string' => "''",
    ];

    /**
     * @var string
     */
    private string $name;

    /**
     * TarsPrimitiveType constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString(): string
    {
        return self::$TYPE_MAP[$this->name] ?? $this->name;
    }

    public static function create(PrimitiveTypeContext $type): self
    {
        foreach (self::$TYPES as $typeName) {
            $method = $typeName.'Type';
            if (null !== $type->$method()) {
                return new self($typeName);
            }
        }
        throw new \InvalidArgumentException('unknown primitive type');
    }

    public function getTarsType(): string
    {
        return $this->name;
    }

    public function getDeclarationType(): ?string
    {
        return (string) $this;
    }

    public function getOpenapiDeclaration(): string
    {
        return self::$OPENAPI_TYPE[$this->name] ?? '';
    }

    public function getDefaultValue(): ?string
    {
        return self::DEFAULT_VALUE[$this->name] ?? null;
    }
}
