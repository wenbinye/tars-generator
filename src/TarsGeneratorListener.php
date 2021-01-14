<?php

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

class TarsGeneratorListener extends TarsBaseListener
{
    /**
     * @var TarsGeneratorContext
     */
    private $context;

    /**
     * @var string
     */
    private $moduleName;

    /**
     * @var TarsConstContext
     */
    private $constContext;

    /**
     * @var TarsEnumContext
     */
    private $enumContext;

    /**
     * @var TarsStructContext
     */
    private $structContext;

    /**
     * @var TarsInterfaceContext
     */
    private $interfaceContext;

    /**
     * TarsGeneratorListener constructor.
     * @param TarsGeneratorContext $context
     */
    public function __construct(TarsGeneratorContext $context)
    {
        $this->context = $context;
    }

    public function enterModuleName(Context\ModuleNameContext $context): void
    {
        $this->moduleName = $context->Identifier()->getText();
        $this->constContext = new TarsConstContext($this->moduleName, $this->context);
    }

    public function enterConstDef(Context\ConstDefContext $context): void
    {
        $type = $context->primitiveType();
        $this->constContext->addConstant(new TarsConst(
            $context->constName()->getText(),
            $type === null ? null : TarsPrimitiveType::create($type),
            $context->value()->getText()
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
        $enum = new TarsEnum($context->enumName()->getText());
        $this->enumContext->setEnum($enum);
    }

    public function exitEnum(Context\EnumContext $context): void
    {
        $this->enumContext->generate();
    }

    public function enterEnumerator(Context\EnumeratorContext $context): void
    {
        $this->enumContext->getEnum()->addEnumerator(
            $context->enumeratorName()->getText(),
            $context->value() !== null ? (int) $context->value()->getText() : null
        );
    }

    public function enterStruct(Context\StructContext $context): void
    {
        $this->structContext = new TarsStructContext($this->moduleName, $this->context);
        $this->structContext->setStruct(new TarsStruct($context->structName()->getText()));
    }

    public function exitStruct(Context\StructContext $context): void
    {
        $this->structContext->generate();
    }

    public function enterStructField(Context\StructFieldContext $context): void
    {
        $type = TarsUnionType::create($context->type());
        $this->structContext->getStruct()->addField(new TarsStructField(
            $context->fieldName()->getText(),
            (int) $context->fieldOrder()->getText(),
            $context->fieldRequire()->getText() === 'require',
            $type,
            $context->value() !== null ? $context->value()->getText() : null
        ));
    }

    public function enterInterfaceDef(Context\InterfaceDefContext $context): void
    {
        $this->interfaceContext = new TarsInterfaceContext($this->moduleName, $this->context);
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
        $operation = new TarsOperation($context->operationName()->getText(), TarsUnionType::create($context->type()));
        $this->extractParams($operation, $context->paramList());
        $this->interfaceContext->getInterface()->addOperation($operation);

        $docs = $this->context->getTokenStream()->getHiddenTokensToLeft($context->getStart()->getTokenIndex(), Token::HIDDEN_CHANNEL);
        if (isset($docs[0])) {
            $operation->setDocBlock(DocBlock::create($docs[0]->getText()));
        }
    }

    private function extractParams(TarsOperation $operation, Context\ParamListContext $paramList): void
    {
        if ($paramList->paramList() !== null) {
            $this->extractParams($operation, $paramList->paramList());
        }
        $paramContext = $paramList->param();
        if ($paramContext !== null) {
            $operation->addParameter(new TarsParameter(
                $paramContext->paramName()->getText(),
                TarsUnionType::create($paramContext->type()),
                $paramContext->out !== null,
                $paramContext->routeKey !== null
            ));
        }
    }
}