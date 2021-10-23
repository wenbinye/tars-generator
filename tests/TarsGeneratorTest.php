<?php

namespace tars;

use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class TarsGeneratorTest extends TestCase
{
    public function testConst()
    {
        $file = __DIR__ . '/fixtures/const.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
    }

    public function testEnum()
    {
        $file = __DIR__ . '/fixtures/enum.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
    }

    public function testStruct()
    {
        $file = __DIR__ . '/fixtures/struct.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
        $this->assertFileEquals('/tmp/src/integration/test/SimpleStruct.php', __DIR__.'/fixtures/generated/struct.php');
    }

    public function testStructOpenapi()
    {
        $file = __DIR__ . '/fixtures/struct.tars';
        $generator = new TarsGenerator($this->createContext(true)->withFile($file));
        $generator->generate();
        $this->assertFileEquals('/tmp/src/integration/test/SimpleStruct.php', __DIR__.'/fixtures/generated/struct_openapi.php');
    }

    public function testInterface()
    {
        $file = __DIR__ . '/fixtures/healthcheck.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
    }


    /**
     * @return TarsGeneratorContext
     */
    private function createContext(bool $enableOpenapi = false): TarsGeneratorContext
    {
        $viewPath = __DIR__ . '/../resources/views';
        $loader = new FilesystemLoader($viewPath);
        $twig = new Environment($loader);
        $twig->addGlobal('generator_version', TarsGenerator::VERSION);
        $config = [
            'namespace' => "foo\\bar\\integration",
            'psr4_namespace' => "foo\\bar",
            'output' => "/tmp/src",
            'flat' => false,
            'enable_openapi' => $enableOpenapi
        ];
        $generatorStrategy = new GenerateStrategyImpl($twig, $config);
        return new TarsGeneratorContext($generatorStrategy, false);
    }
}
