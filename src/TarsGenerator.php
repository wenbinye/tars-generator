<?php

declare(strict_types=1);

namespace tars;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\DiagnosticErrorListener;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\Tree\ParseTreeWalker;
use tars\parse\TarsLexer;
use tars\parse\TarsParser;

class TarsGenerator
{
    public const VERSION = '0.6';

    public function __construct(private readonly TarsGeneratorContext $context)
    {
    }

    public function generate(): void
    {
        $input = InputStream::fromPath($this->context->getFile());
        $lexer = new TarsLexer($input);
        $tokens = new CommonTokenStream($lexer);
        $parser = new TarsParser($tokens);
        $parser->addErrorListener(new DiagnosticErrorListener());
        $parser->setBuildParseTree(true);
        $tree = $parser->root();

        ParseTreeWalker::default()->walk(new TarsGeneratorListener($this->context->withTokenStream($tokens)), $tree);
    }
}
