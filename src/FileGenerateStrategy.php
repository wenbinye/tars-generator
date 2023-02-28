<?php

declare(strict_types=1);

namespace tars;

use RuntimeException;

class FileGenerateStrategy extends AbstractGenerateStrategy
{
    protected function write(string $file, string $code): void
    {
        $dir = dirname($file);
        if (!is_dir($dir) && !mkdir($dir, 0777, true) && !is_dir($dir)) {
            throw new RuntimeException("Cannot create directory $dir");
        }

        file_put_contents($file, $code);
    }
}
