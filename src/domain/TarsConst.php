<?php

declare(strict_types=1);

namespace tars\domain;

class TarsConst
{
    /**
     * @var string
     */
    private string $name;

    /**
     * @var TarsPrimitiveType|null
     */
    private ?TarsPrimitiveType $type;

    /**
     * @var string
     */
    private string $value;

    /**
     * TarsConst constructor.
     *
     * @param string                 $name
     * @param TarsPrimitiveType|null $type
     * @param string                 $value
     */
    public function __construct(string $name, ?TarsPrimitiveType $type, string $value)
    {
        $this->name = $name;
        $this->type = $type;
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return TarsPrimitiveType|null
     */
    public function getType(): ?TarsPrimitiveType
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }
}
