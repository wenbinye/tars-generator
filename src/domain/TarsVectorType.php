<?php

declare(strict_types=1);

namespace tars\domain;

use kuiper\jsonrpc\core\BinaryString;
use tars\GeneratorConfig;
use tars\parse\Context\VectorTypeContext;
use tars\TarsGeneratorContext;
use Webmozart\Assert\Assert;

class TarsVectorType implements TarsType
{
    /**
     * @var TarsUnionType
     */
    private TarsUnionType $itemType;

    /**
     * @param TarsUnionType $itemType
     */
    public function __construct(TarsUnionType $itemType)
    {
        $this->itemType = $itemType;
    }

    public static function create(VectorTypeContext $vectorType): TarsType
    {
        $typeContext = $vectorType->type();
        Assert::notNull($typeContext);
        $itemType = TarsUnionType::create($typeContext);
        if ('byte' === $itemType->getTarsType()) {
            if (GeneratorConfig::PROTOCOL_JSONRPC === TarsGeneratorContext::getInstance()->getProtocol()) {
                return new TarsCustomType('\\'.BinaryString::class);
            }

            return new TarsVectorByteType();
        }

        return new self($itemType);
    }

    public function __toString(): string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return 'string';
        }

        return ((string) $this->itemType).'[]';
    }

    public function getTarsType(): string
    {
        return 'vector<'.$this->itemType->getTarsType().'>';
    }

    public function getItemType(): TarsUnionType
    {
        return $this->itemType;
    }

    public function getDeclarationType(): ?string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return 'string';
        }

        return 'array';
    }

    public function getDocBlockType(): ?string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return 'string';
        }

        return $this->itemType->getDocBlockType().'[]';
    }

    public function getOpenapiDeclaration(): string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return 'type: "string"';
        }

        return sprintf('type: "array", items: new OA\Items(%s)', $this->itemType->getOpenapiDeclaration());
    }

    public function getDefaultValue(): ?string
    {
        if ('byte' === $this->itemType->getTarsType()) {
            return "''";
        }

        return '[]';
    }
}
