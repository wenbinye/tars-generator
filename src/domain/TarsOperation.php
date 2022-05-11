<?php

declare(strict_types=1);

namespace tars\domain;

class TarsOperation
{
    /**
     * @var TarsParameter[]
     */
    private array $parameters = [];

    /**
     * @var DocBlock|null
     */
    private ?DocBlock $docBlock = null;

    public function __construct(private readonly string $name, private readonly TarsUnionType $returnType)
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return TarsUnionType
     */
    public function getReturnType(): TarsUnionType
    {
        return $this->returnType;
    }

    public function addParameter(TarsParameter $parameter): void
    {
        $this->parameters[] = $parameter;
    }

    /**
     * @return TarsParameter[]
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function hasPhpReturnType(): bool
    {
        return null !== $this->returnType->getDeclarationType();
    }

    public function getPhpReturnType(): ?string
    {
        return $this->returnType->getDeclarationType();
    }

    /**
     * @return DocBlock|null
     */
    public function getDocBlock(): ?DocBlock
    {
        return $this->docBlock;
    }

    /**
     * @param DocBlock|null $docBlock
     */
    public function setDocBlock(?DocBlock $docBlock): void
    {
        $this->docBlock = $docBlock;
    }
}
