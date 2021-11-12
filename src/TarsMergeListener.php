<?php

declare(strict_types=1);

namespace tars;

use Antlr\Antlr4\Runtime\Token;
use Antlr\Antlr4\Runtime\Tree\TerminalNode;
use tars\domain\TarsModule;
use tars\parse\Context\DefinitionContext;
use tars\parse\Context\ModuleDefContext;
use tars\parse\Context\ModuleNameContext;
use tars\parse\TarsBaseListener;
use Webmozart\Assert\Assert;

class TarsMergeListener extends TarsBaseListener
{
    /**
     * @var TarsModule[]
     */
    private array $modules = [];

    public function enterModuleDef(ModuleDefContext $context): void
    {
        $module = null;

        for ($i = 0, $count = $context->getChildCount(); $i < $count; ++$i) {
            $child = $context->getChild($i);
            if ($child instanceof ModuleNameContext) {
                $moduleName = $child->getText();
                if (!isset($this->modules[$moduleName])) {
                    $this->modules[$moduleName] = new TarsModule($moduleName);
                }
                $module = $this->modules[$moduleName];
            } elseif ($child instanceof DefinitionContext) {
                Assert::greaterThan($i, 1);
                $prev = $context->getChild($i - 1);
                $leftText = $this->getTextBetween($prev instanceof TerminalNode ? $prev->getSymbol() : $prev->getStop(), $child->getStart());
                $next = $context->getChild($i + 1);
                $rightText = '';
                if ($next instanceof TerminalNode) {
                    $rightText = $this->getTextBetween($child->getStop(), $next->getSymbol());
                }
                $module->addDefinition($leftText, $child, $rightText);
            }
        }
    }

    private function getTextBetween(?Token $prev, ?Token $next): string
    {
        if (null !== $prev && null !== $next) {
            $stream = $prev->getInputStream();
            Assert::notNull($stream);

            return $stream->getText($prev->getStopIndex() + 1, $next->getStartIndex() - 1);
        }

        return '';
    }

    /**
     * @return TarsModule[]
     */
    public function getModules(): array
    {
        return $this->modules;
    }
}
