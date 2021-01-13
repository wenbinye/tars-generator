<?php

namespace tars;

interface GenerateStrategy
{
    public function getConstClassName(): string;

    public function getNamespace(string $moduleName): string;

    public function generate(domain\AbstractContext $context): void;
}
