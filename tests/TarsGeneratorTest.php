<?php

declare(strict_types=1);

namespace tars;

use Antlr\Antlr4\Runtime\CommonTokenStream;
use Antlr\Antlr4\Runtime\Error\Listeners\DiagnosticErrorListener;
use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\Tree\ParseTreeWalker;
use PHPUnit\Framework\TestCase;
use tars\parse\TarsLexer;
use tars\parse\TarsParser;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TarsGeneratorTest extends TestCase
{
    private InMemoryGenerateStrategy $generateStrategy;

    public function testSimple()
    {
        $code = file_get_contents(__DIR__.'/fixtures/servant/const.tars');
        // echo $code, "\n";
        $input = InputStream::fromString($code);
        $lexer = new TarsLexer($input);
        $tokens = new CommonTokenStream($lexer);
        $parser = new TarsParser($tokens);
        $parser->addErrorListener(new DiagnosticErrorListener());
        $parser->setBuildParseTree(true);
        $tree = $parser->root();

        ParseTreeWalker::default()->walk(new TarsMergeListener($tokens), $tree);
        $this->assertTrue(true);
    }

    public function testMerge()
    {
        $code = implode("\n", array_map('file_get_contents', glob(__DIR__.'/fixtures/servant/*.tars')));
        // echo $code, "\n";
        $input = InputStream::fromString($code);
        $lexer = new TarsLexer($input);
        $tokens = new CommonTokenStream($lexer);
        $parser = new TarsParser($tokens);
        $parser->addErrorListener(new DiagnosticErrorListener());
        $parser->setBuildParseTree(true);
        $tree = $parser->root();

        $listener = new TarsMergeListener();
        ParseTreeWalker::default()->walk($listener, $tree);
        echo implode("\n", $listener->getModules());
        $this->assertCount(1, $listener->getModules());
    }

    public function testConst()
    {
        $file = __DIR__.'/fixtures/const.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
        $codes = $this->generateStrategy->getCodes();
        // var_export($codes);
        $this->assertStringEqualsFile(__DIR__.'/fixtures/generated/const.php',
            $codes['/tmp/src/integration/test/Constants.php']);
    }

    public function testInclude()
    {
        $file = __DIR__.'/fixtures/servant/interface.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
        $codes = $this->generateStrategy->getCodes();
        var_export($codes);
        $this->assertStringEqualsFile(__DIR__.'/fixtures/generated/interface.php',
            $codes['/tmp/src/integration/demo/HelloServant.php']);
    }

    public function testEnum()
    {
        $file = __DIR__.'/fixtures/enum.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
        $codes = $this->generateStrategy->getCodes();
        // var_export($codes);
        $this->assertStringEqualsFile(__DIR__.'/fixtures/generated/enum.php',
            $codes['/tmp/src/integration/test/TE.php']);
    }

    public function testStruct()
    {
        $file = __DIR__.'/fixtures/struct.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
        $codes = $this->generateStrategy->getCodes();
        // var_export($codes);
        $this->assertStringEqualsFile(__DIR__.'/fixtures/generated/struct.php',
            $codes['/tmp/src/integration/test/SimpleStruct.php']);
    }

    public function testStructOpenapi()
    {
        $file = __DIR__.'/fixtures/struct.tars';
        $generator = new TarsGenerator($this->createContext(true)->withFile($file));
        $generator->generate();
        $codes = $this->generateStrategy->getCodes();
        $this->assertStringEqualsFile(
            __DIR__.'/fixtures/generated/struct_openapi.php',
            $codes['/tmp/src/integration/test/SimpleStruct.php']
        );
    }

    public function testStrictType()
    {
        $file = __DIR__.'/fixtures/struct.tars';
        $generator = new TarsGenerator($this->createContext(strictType: false, protocol: 'jsonrpc')->withFile($file));
        $generator->generate();
        $codes = $this->generateStrategy->getCodes();
        $this->assertStringEqualsFile(
            __DIR__.'/fixtures/generated/struct_no_strict_type.php',
            $codes['/tmp/src/integration/test/SimpleStruct.php']
        );
    }


    public function testInterface()
    {
        $file = __DIR__.'/fixtures/healthcheck.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();

        $codes = $this->generateStrategy->getCodes();
        // var_export($codes);
        $this->assertStringEqualsFile(
            __DIR__.'/fixtures/generated/HealthCheck.php',
            $codes['/tmp/src/integration/test/HealthCheckServant.php']
        );
    }

    /**
     * @return TarsGeneratorContext
     */
    private function createContext(bool $enableOpenapi = false, bool $strictType = true, string $protocol = 'tars'): TarsGeneratorContext
    {
        $viewPath = __DIR__.'/../resources/views';
        $loader = new FilesystemLoader($viewPath);
        $twig = new Environment($loader);
        $twig->addGlobal('generator_version', TarsGenerator::VERSION);
        $config = GeneratorConfig::fromArray([
            'namespace' => 'foo\\bar\\integration',
            'psr4_namespace' => 'foo\\bar',
            'output' => '/tmp/src',
            'flat' => false,
            'enable_openapi' => $enableOpenapi,
            'protocol' => $protocol,
            'strict_type' => $strictType
        ]);
        $this->generateStrategy = new InMemoryGenerateStrategy($twig, $config);

        return new TarsGeneratorContext($this->generateStrategy, false);
    }
}
