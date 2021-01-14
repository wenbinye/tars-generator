<?php

namespace tars;

interface GenerateStrategy
{
    public function getConstClassName(): string;

    public function getEnumClassName(string $enumName): string;

    public function getStructClassName(string $structName): string;

    public function getInterfaceClassName(string $interfaceName): string;

    public function getNamespace(string $moduleName): string;

    public function generate(domain\AbstractContext $context): void;

}
