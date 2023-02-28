<?php

declare(strict_types=1);

namespace tars;

use Antlr\Antlr4\Runtime\Token;
use tars\domain\DocBlock;
use tars\domain\TarsConst;
use tars\domain\TarsConstContext;
use tars\domain\TarsEnum;
use tars\domain\TarsEnumContext;
use tars\domain\TarsInterface;
use tars\domain\TarsInterfaceContext;
use tars\domain\TarsOperation;
use tars\domain\TarsParameter;
use tars\domain\TarsPrimitiveType;
use tars\domain\TarsStruct;
use tars\domain\TarsStructContext;
use tars\domain\TarsStructField;
use tars\domain\TarsUnionType;
use tars\parse\Context;
use tars\parse\TarsBaseListener;
use Webmozart\Assert\Assert;

class TarsGeneratorListener extends TarsBaseListener
{
    /**
     * @var string
     */
    private string $moduleName;

    /**
     * @var TarsConstContext
     */
    private TarsConstContext $constContext;

    /**
     * @var TarsEnumContext
     */
    private TarsEnumContext $enumContext;

    /**
     * @var TarsStructContext
     */
    private TarsStructContext $structContext;

    /**
     * @var TarsInterfaceContext
     */
    private TarsInterfaceContext $interfaceContext;

    public function __construct(private readonly TarsGeneratorContext $context)
    {
    }

    public function enterModuleName(Context\ModuleNameContext $context): void
    {
        $node = $context->Identifier();
        Assert::notNull($node);
        Assert::notNull($node->getText());
        $this->moduleName = $node->getText();
        $this->constContext = new TarsConstContext($this->moduleName, $this->context);
    }

    public function enterConstDef(Context\ConstDefContext $context): void
    {
        $type = $context->primitiveType();
        $constNameContext = $context->constName();
        Assert::notNull($constNameContext);
        $valueContext = $context->value();
        Assert::notNull($valueContext);
        $this->constContext->addConstant(new TarsConst(
            $constNameContext->getText(),
            null === $type ? null : TarsPrimitiveType::create($type),
            $valueContext->getText()
        ));
    }

    public function exitModuleDef(Context\ModuleDefContext $context): void
    {
        if (!empty($this->constContext->getConstants())) {
            $this->constContext->generate();
        }
    }

    public function enterEnum(Context\EnumContext $context): void
    {
        $this->enumContext = new TarsEnumContext($this->moduleName, $this->context);
        $enumNameContext = $context->enumName();
        Assert::notNull($enumNameContext);
        $enum = new TarsEnum($enumNameContext->getText());
        $this->enumContext->setEnum($enum);
    }

    public function exitEnum(Context\EnumContext $context): void
    {
        $this->enumContext->generate();
    }

    public function enterEnumerator(Context\EnumeratorContext $context): void
    {
        $enumeratorNameContext = $context->enumeratorName();
        Assert::notNull($enumeratorNameContext);
        $this->enumContext->getEnum()->addEnumerator(
            $enumeratorNameContext->getText(),
            null !== $context->value() ? (int) $context->value()->getText() : null
        );
    }

    public function enterStruct(Context\StructContext $context): void
    {
        $this->structContext = new TarsStructContext($this->moduleName, $this->context);
        $structNameContext = $context->structName();
        Assert::notNull($structNameContext);
        $this->structContext->setStruct(new TarsStruct($structNameContext->getText()));
    }

    public function exitStruct(Context\StructContext $context): void
    {
        $this->structContext->generate();
    }

    public function enterStructField(Context\StructFieldContext $context): void
    {
        Assert::notNull($context->type());
        $type = TarsUnionType::create($context->type());
        Assert::notNull($context->fieldName());
        Assert::notNull($context->fieldOrder());
        Assert::notNull($context->fieldRequire());
        $this->structContext->getStruct()->addField(new TarsStructField(
            $context->fieldName()->getText(),
            (int) $context->fieldOrder()->getText(),
            'require' === $context->fieldRequire()->getText(),
            $type,
            $this->createFieldDefaultValue($context, $type)
        ));
    }

    private function createFieldDefaultValue(Context\StructFieldContext $context, TarsUnionType $type): ?string
    {
        $defaultValue = null !== $context->value() ? $context->value()->getText() : null;
        if (null !== $defaultValue) {
            return $defaultValue;
        }
        if ('require' === $context->fieldRequire()->getText()) {
            return $type->getDefaultValue();
        }

        return null;
    }

    public function enterInterfaceDef(Context\InterfaceDefContext $context): void
    {
        $this->interfaceContext = new TarsInterfaceContext($this->moduleName, $this->context);
        Assert::notNull($context->interfaceName());
        $this->interfaceContext->setInterface(new TarsInterface($context->interfaceName()->getText()));
        $this->interfaceContext->setServant($this->context->isServant());
        $this->interfaceContext->setServantName($this->context->getServantName(
            $this->moduleName, $this->interfaceContext->getInterface()->getName()
        ));
    }

    public function exitInterfaceDef(Context\InterfaceDefContext $context): void
    {
        $this->interfaceContext->generate();
    }

    public function enterOperation(Context\OperationContext $context): void
    {
        Assert::notNull($context->operationName());
        Assert::notNull($context->type());
        Assert::notNull($context->getStart());
        $operation = new TarsOperation($context->operationName()->getText(), TarsUnionType::create($context->type()));
        $this->extractParams($operation, $context->paramList());
        $this->interfaceContext->getInterface()->addOperation($operation);

        $docs = $this->context->getTokenStream()->getHiddenTokensToLeft($context->getStart()->getTokenIndex(), Token::HIDDEN_CHANNEL);
        if (isset($docs[0])) {
            $operation->setDocBlock(DocBlock::create($docs[0]->getText() ?? ''));
        }
    }

    private function extractParams(TarsOperation $operation, ?Context\ParamListContext $paramList): void
    {
        if (null === $paramList) {
            return;
        }
        if (null !== $paramList->paramList()) {
            $this->extractParams($operation, $paramList->paramList());
        }
        $paramContext = $paramList->param();
        if (null !== $paramContext) {
            Assert::notNull($paramContext->paramName());
            Assert::notNull($paramContext->type());
            $operation->addParameter(new TarsParameter(
                $paramContext->paramName()->getText(),
                TarsUnionType::create($paramContext->type()),
                null !== $paramContext->out,
                null !== $paramContext->routeKey
            ));
        }
    }
}
