<?php

namespace tars\domain;

class TarsOperation
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var TarsUnionType
     */
    private $returnType;

    /**
     * @var TarsParameter[]
     */
    private $parameters = [];

    /**
     * @var DocBlock|null
     */
    private $docBlock;

    /**
     * TarsOperation constructor.
     * @param string $name
     * @param TarsUnionType $returnType
     */
    public function __construct(string $name, TarsUnionType $returnType)
    {
        $this->name = $name;
        $this->returnType = $returnType;
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
        return $this->returnType->getReturnType() !== null;
    }

    public function getPhpReturnType(): ?string
    {
        return $this->returnType->getReturnType();
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