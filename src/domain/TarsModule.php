<?php

declare(strict_types=1);

namespace tars\domain;

use Antlr\Antlr4\Runtime\RuleContext;
use Antlr\Antlr4\Runtime\Tree\TerminalNode;
use tars\parse\Context\ConstDefContext;
use tars\parse\Context\DefinitionContext;
use tars\parse\Context\EnumContext;
use tars\parse\Context\InterfaceDefContext;
use tars\parse\Context\KeyMapContext;
use tars\parse\Context\StructContext;
use Webmozart\Assert\Assert;

class TarsModule
{
    private string $name;

    /**
     * @var array
     */
    private array $definitions = [];

    private const DEFINITION_INDEX = [
        ConstDefContext::class => 0,
        EnumContext::class => 1,
        StructContext::class => 2,
        InterfaceDefContext::class => 3,
        KeyMapContext::class => 4,
    ];

    /**
     * TarsModule constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function addDefinition(string $leftText, DefinitionContext $definition, string $rightText): void
    {
        $this->definitions[] = [$leftText, $definition, $rightText];
    }

    private function getDefinitionIndex(array $item): int
    {
        $definition = $item[1];
        Assert::isInstanceOf($definition, DefinitionContext::class);

        return self::DEFINITION_INDEX[get_class($definition->getChild(0))];
    }

    private function sortDefinitions(): array
    {
        $definitions = $this->definitions;
        usort($definitions, function ($a, $b) {
            return $this->getDefinitionIndex($a) <=> $this->getDefinitionIndex($b);
        });

        return $definitions;
    }

    private function ruleContextToText(RuleContext $context): string
    {
        $text = '';
        for ($i = 0, $count = $context->getChildCount(); $i < $count; ++$i) {
            $child = $context->getChild($i);
            if (null !== $child) {
                if ($child instanceof TerminalNode) {
                    $text .= $child->getText();
                } elseif ($child instanceof RuleContext) {
                    $text .= $this->ruleContextToText($child);
                }
            }
            if ($i + 1 < $count) {
                $next = $context->getChild($i + 1);
                $stop = $child instanceof TerminalNode ? $child->getSymbol() : $child->getStop();
                $start = $next instanceof TerminalNode ? $next->getSymbol() : $next->getStart();
                Assert::notNull($stop);
                Assert::notNull($start);
                $text .= $stop->getInputStream()->getText($stop->getStopIndex() + 1, $start->getStartIndex() - 1);
            }
        }

        return $text;
    }

    public function __toString()
    {
        return "module {$this->name}\n{\n"
            .implode('', array_map(function (array $item) {
                return $item[0].$this->ruleContextToText($item[1]).$item[2];
            }, $this->sortDefinitions()))
            ."};\n";
    }
}
