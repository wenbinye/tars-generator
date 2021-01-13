<?php

namespace tars;

use tars\domain\TarsConst;
use tars\domain\TarsConstContext;
use tars\domain\TarsEnum;
use tars\domain\TarsEnumContext;
use tars\domain\TarsPrimitiveType;
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

    public function enterEnum(Context\EnumContext $context): void
    {
        $enumContext = new TarsEnumContext($this->moduleName, $this->context);
        $enum = new TarsEnum($context->enumName()->getText());
        foreach ($context->enumeratorList())
        $enum->addEnumerator();
        $enumContext->setEnum($enum);
        $enumContext->generate();
    }

    public function exitNamespaceDef(Context\NamespaceDefContext $context): void
    {
        $this->constContext->generate();
    }
}