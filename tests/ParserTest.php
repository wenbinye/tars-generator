<?php

namespace tars;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\DiagnosticErrorListener;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\Tree\ParseTreeWalker;
use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    public function testName()
    {
        $file = __DIR__ . '/fixtures/const.tars';
        $input = InputStream::fromPath($file);
        $lexer = new TarsLexer($input);
        $tokens = new CommonTokenStream($lexer);
        $parser = new TarsParser($tokens);
        $parser->addErrorListener(new DiagnosticErrorListener());
        $parser->setBuildParseTree(true);
        $tree = $parser->root();

        ParseTreeWalker::default()->walk(new DumpListener(), $tree);
    }

    public function testDocString()
    {
        $file = __DIR__ . '/fixtures/const.tars';
        $input = InputStream::fromPath($file);
        $lexer = new TarsLexer($input);
        $tokens = new CommonTokenStream($lexer);
        $parser = new TarsParser($tokens);
        $parser->addErrorListener(new DiagnosticErrorListener());
        $parser->setBuildParseTree(true);
        $tree = $parser->root();

        ParseTreeWalker::default()->walk(new DocStringListener($tokens), $tree);
    }
}
