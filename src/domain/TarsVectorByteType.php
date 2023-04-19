<?php

declare(strict_types=1);

namespace tars\domain;

class TarsVectorByteType extends TarsVectorType
{
    public function __construct()
    {
        parent::__construct(new TarsUnionType(new TarsPrimitiveType('byte')));
    }

    public function __toString(): string
    {
        return 'string';
    }

    public function getTarsType(): string
    {
        return 'vector<byte>';
    }

    public function getDeclarationType(): ?string
    {
        return 'string';
    }

    public function getDocBlockType(): ?string
    {
        return 'string';
    }

    public function getOpenapiDeclaration(): string
    {
        return 'type: "string"';
    }

    public function getDefaultValue(): ?string
    {
        return "''";
    }
}
