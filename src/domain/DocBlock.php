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
        $rawLines = explode("\n", $docBlock);
        $first = trim($rawLines[0] ?? '');
        $isSingleLine = str_starts_with($first, '/**') && 1 === count($rawLines);

        if ($isSingleLine) {
            // Single-line docblock: /** description */
            if (preg_match('#^/\*\*\s*(.+?)\s*\*/$#s', $docBlock, $m) !== false) {
                $content = trim($m[1]);
                if ($content !== '' && !str_starts_with($content, '@')) {
                    $lines[] = $content;
                }
            }
        } else {
            // Multi-line docblock
            foreach ($rawLines as $idx => $rawLine) {
                $line = trim($rawLine);
                // Skip opening /** marker
                if ($idx === 0 && str_starts_with($first, '/**')) {
                    // Extract content after /** on the first line if any (e.g. /** summary line)
                    if (preg_match('#^/\*\*\s*\*(.+)$#', $rawLine, $m) !== false && isset($m[1])) {
                        $trimmed = trim($m[1], '* ');
                        if ($trimmed !== '' && !str_starts_with($trimmed, '@')) {
                            $lines[] = $trimmed;
                        }
                    }
                    continue;
                }
                // Skip closing */ marker
                if ($line === '*/') {
                    continue;
                }
                // Strip trailing */ from content lines (can happen when lexer merges tokens)
                // Check both */ and *\/ (escaped variant) before trimming, since trim('* ') strips the /
                if (str_ends_with($line, '*/')) {
                    $line = substr($line, 0, -2);
                } elseif (str_ends_with($line, '*\/')) {
                    $line = substr($line, 0, -3) . '/';
                }
                $line = trim($line, '* ');
                if ($line === '*/') {
                    continue;
                }
                // Normalize @var/@return/@param, strip leading *
                $normalized = preg_replace('#@(var|return|param)\s+#', '@tars-\1 ', $line);
                $lines[] = $normalized;
            }
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
