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
        $struct = new TarsStruct($structNameContext->getText());

        // Extract docblock description from HIDDEN channel
        // getHiddenTokensToLeft returns ALL hidden tokens between the previous default-channel
        // token and the current token. Use the LAST one (most recent) — earlier tokens may be
        // unrelated separator comments (// ===...===) between blank lines and the docblock.
        Assert::notNull($context->getStart());
        $docs = $this->context->getTokenStream()->getHiddenTokensToLeft($context->getStart()->getTokenIndex(), Token::HIDDEN_CHANNEL);
        if (isset($docs[0])) {
            $lastDoc = $docs[array_key_last($docs)];
            $rawDoc = $lastDoc->getText() ?? '';
            if (str_starts_with(trim($rawDoc), '/**')) {
                $docBlock = DocBlock::create($rawDoc);
                $summary = $docBlock->getSummary();
                if (null !== $summary && $summary !== '') {
                    $struct->setDescription($summary);
                }
            }
        }

        $this->structContext->setStruct($struct);
    }

    public function exitStruct(Context\StructContext $context): void
    {
        $this->structContext->generate();
    }

    public function exitStructField(Context\StructFieldContext $context): void
    {
        Assert::notNull($context->type());
        $type = TarsUnionType::create($context->type());
        Assert::notNull($context->fieldName());
        Assert::notNull($context->fieldOrder());
        Assert::notNull($context->fieldRequire());
        $field = new TarsStructField(
            $context->fieldName()->getText(),
            (int) $context->fieldOrder()->getText(),
            'require' === $context->fieldRequire()->getText(),
            $type,
            $this->createFieldDefaultValue($context, $type)
        );

        // Extract docblock description from HIDDEN channel tokens
        Assert::notNull($context->getStart());
        $docs = $this->context->getTokenStream()->getHiddenTokensToLeft($context->getStart()->getTokenIndex(), Token::HIDDEN_CHANNEL);
        if (isset($docs[0])) {
            $rawDoc = $docs[0]->getText() ?? '';
            if (str_starts_with(trim($rawDoc), '/**')) {
                $docBlock = DocBlock::create($rawDoc);
                $summary = $docBlock->getSummary();
                if (null !== $summary && $summary !== '') {
                    $field->setDescription($summary);
                }
            }
        }

        $this->structContext->getStruct()->addField($field);
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
        if (!isset($docs[0])) {
            return;
        }

        $rawDoc = $docs[0]->getText() ?? '';
        if (!str_starts_with(trim($rawDoc), '/**')) {
            return;
        }

        // Extract @param descriptions from raw text BEFORE DocBlock::create()
        // (create() rewrites @param prefix to @tars-param, destroying the raw description text)
        // Note: TARS param syntax uses `name` (no $ prefix), so regex captures (\w+) directly
        // Use [^\S\n]+ instead of \s+ for word separators to avoid matching newlines
        // Also strip trailing */ from the description (can appear when lexer merges tokens)
        $paramDescriptions = [];
        if (preg_match_all('/@param[^\S\n]+\S+[^\S\n]+(\w+)[^\S\n]+([^\n]*)/', $rawDoc, $matches, PREG_SET_ORDER) !== false) {
            foreach ($matches as $m) {
                $desc = trim($m[2]);
                // Strip trailing */ or *\/ that may be left on the line
                if (str_ends_with($desc, '*/')) {
                    $desc = substr($desc, 0, -2);
                } elseif (str_ends_with($desc, '*\/')) {
                    $desc = substr($desc, 0, -3) . '/';
                }
                $paramDescriptions[$m[1]] = trim($desc);
            }
        }

        // Set descriptions on TarsParameter objects
        foreach ($operation->getParameters() as $param) {
            if (isset($paramDescriptions[$param->getName()])) {
                $param->setDescription($paramDescriptions[$param->getName()]);
            }
        }

        // Create normalized DocBlock and extract structured metadata
        $docBlock = DocBlock::create($rawDoc);
        $operation->setDocBlock($docBlock);
        $operation->setSummary($docBlock->getSummary());
        $operation->setDescription($docBlock->getDescription());

        $throws = $docBlock->getThrows();
        foreach ($throws as &$t) {
            if (!str_starts_with($t['class'], '\\')) {
                $t['class'] = '\\' . $t['class'];
            }
        }
        $operation->setThrows($throws);
        $operation->setParamDescriptions($paramDescriptions);
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
