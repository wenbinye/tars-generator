<?php

declare(strict_types=1);

namespace tars\domain;

use ArrayIterator;
use Iterator;

/**
 * @template DocBlock<int, string|null>
 */
class DocBlock implements Iterator
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
            if (str_starts_with($line, '/**') || str_starts_with($line, '*/')) {
                continue;
            }
            $lines[] = preg_replace('#@(var|return|param)\s+#', '@tars-\1 ', trim($line, '* '));
        }

        return new self(new ArrayIterator($lines));
    }

    /**
     * @return mixed
     */
    public function current(): mixed
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
    public function key(): mixed
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

    /**
     * Returns the summary line: first non-empty, non-tag line.
     */
    public function getSummary(): ?string
    {
        foreach ($this->lines as $line) {
            if (null !== $line && '' !== $line && !str_starts_with($line, '@')) {
                return $line;
            }
        }
        return null;
    }

    /**
     * Returns the description: all non-tag lines after the first empty line, joined by newlines.
     */
    public function getDescription(): string
    {
        $lines = [];
        $pastFirstEmpty = false;
        foreach ($this->lines as $line) {
            if (null === $line) {
                continue;
            }
            if (str_starts_with($line, '@')) {
                break;
            }
            if ('' === $line) {
                $pastFirstEmpty = true;
                continue;
            }
            if ($pastFirstEmpty) {
                $lines[] = $line;
            }
        }
        return implode("\n", $lines);
    }

    /**
     * Parses @throws annotations from the normalized lines.
     *
     * DocBlock::create() does NOT normalize @throws (only @var/@return/@param),
     * so this method matches '@throws' directly.
     *
     * @return array<int, array{class: string, code: string, message: string}>
     */
    public function getThrows(): array
    {
        $throws = [];
        foreach ($this->lines as $line) {
            if (null === $line) {
                continue;
            }
            // Format: @throws ClassName $code "message"
            if (1 === preg_match('#^@throws\s+([\\\\\w]+)\s+\$(\d+)\s+"(.*)"#', $line, $matches)) {
                $throws[] = [
                    'class' => $matches[1],
                    'code' => $matches[2],
                    'message' => $matches[3],
                ];
            }
        }
        return $throws;
    }
}
