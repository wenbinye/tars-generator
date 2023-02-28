<?php

declare(strict_types=1);

namespace tars\domain;

use InvalidArgumentException;
use tars\parse\Context\CustomTypeContext;
use Webmozart\Assert\Assert;

class TarsCustomType implements TarsType
{
    private readonly string $name;

    public static function create(CustomTypeContext $customType): self
    {
        if (null !== $customType->moduleName()) {
            throw new InvalidArgumentException('暂时不支持引用其他 module 类型');
        }
        $type = new self();
        $identifier = $customType->Identifier();
        Assert::notNull($identifier);
        $type->name = $identifier->getText() ?? '';

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

    public function getOpenapiDeclaration(): string
    {
        return sprintf('ref: "#/components/schemas/%s"', $this->name);
    }

    public function getDefaultValue(): ?string
    {
        return 'null';
    }
}
