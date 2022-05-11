<?php

declare(strict_types=1);

namespace tars;

class InMemoryGenerateStrategy extends AbstractGenerateStrategy
{
    /**
     * @var string[]
     */
    private array $codes = [];

    public function getCodes(): array
    {
        return $this->codes;
    }

    protected function write(string $file, string $code): void
    {
        $this->codes[$file] = $code;
    }
}
