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

    private ?string $summary = null;

    private ?string $description = null;

    /**
     * @var array<int, array{class: string, code: string, message: string}>
     */
    private array $throws = [];

    /**
     * @var array<string, string>
     */
    private array $paramDescriptions = [];

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

    public function setSummary(?string $summary): void
    {
        $this->summary = $summary;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param array<int, array{class: string, code: string, message: string}> $throws
     */
    public function setThrows(array $throws): void
    {
        $this->throws = $throws;
    }

    /**
     * @return array<int, array{class: string, code: string, message: string}>
     */
    public function getThrows(): array
    {
        return $this->throws;
    }

    /**
     * @param array<string, string> $paramDescriptions
     */
    public function setParamDescriptions(array $paramDescriptions): void
    {
        $this->paramDescriptions = $paramDescriptions;
    }

    /**
     * @return array<string, string>
     */
    public function getParamDescriptions(): array
    {
        return $this->paramDescriptions;
    }

    public function hasMetadata(): bool
    {
        return null !== $this->summary
            || null !== $this->description
            || [] !== $this->throws
            || [] !== $this->paramDescriptions;
    }
}
