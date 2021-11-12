<?php

declare(strict_types=1);

namespace tars\domain;

use ArrayIterator;

/**
 * @template DocBlock<int, string|null>
 */
class DocBlock implements \Iterator
{
    /**
     * @var ArrayIterator<int,string|null>
     */
    private ArrayIterator $lines;

    /**
     * DocBlock constructor.
     *
     * @param ArrayIterator<int,string|null> $lines
     */
    public function __construct(ArrayIterator $lines)
    {
        $this->lines = $lines;
    }

    public static function create(string $docBlock): self
    {
        $lines = [];
        foreach (explode("\n", $docBlock) as $line) {
            $line = trim($line);
            if (0 === strpos($line, '/**') || 0 === strpos($line, '*/')) {
                continue;
            }
            $lines[] = preg_replace('#@(var|return|param)\s+#', '@tars-\1 ', trim($line, '* '));
        }

        return new self(new ArrayIterator($lines));
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->lines->current();
    }

    public function next(): void
    {
        $this->lines->next();
    }

    /**
     * @return bool|float|int|string|null
     */
    public function key()
    {
        return $this->lines->key();
    }

    public function valid(): bool
    {
        return $this->lines->valid();
    }

    public function rewind(): void
    {
        $this->lines->rewind();
    }
}
