<?php


namespace tars\domain;


class DocBlock implements \Iterator
{
    /**
     * @var \ArrayIterator
     */
    private $lines;

    /**
     * DocBlock constructor.
     * @param \ArrayIterator $lines
     */
    public function __construct(\ArrayIterator $lines)
    {
        $this->lines = $lines;
    }

    public static function create(string $docBlock): self
    {
        $lines = [];
        foreach (explode("\n", $docBlock) as $line) {
            $line = trim($line);
            if (strpos($line, '/**') === 0 || strpos($line, '*/') === 0) {
                continue;
            }
            $lines[] = trim($line, '* ');
        }
        return new self(new \ArrayIterator($lines));
    }

    public function current()
    {
        return $this->lines->current();
    }

    public function next(): void
    {
        $this->lines->next();
    }

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