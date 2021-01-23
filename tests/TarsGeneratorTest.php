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
    }

    public function testInterface()
    {
        $file = __DIR__ . '/fixtures/interface.tars';
        $generator = new TarsGenerator($this->createContext()->withFile($file));
        $generator->generate();
    }


    /**
     * @return TarsGeneratorContext
     */
    private function createContext(): TarsGeneratorContext
    {
        $viewPath = __DIR__ . '/../resources/views';
        $loader = new FilesystemLoader($viewPath);
        $twig = new Environment($loader);
        $twig->addGlobal('generator_version', TarsGenerator::VERSION);
        $generatorStrategy = new GenerateStrategyImpl("foo\\bar", "/tmp/src", "foo\\bar\\integration", $twig, false);
        return new TarsGeneratorContext($generatorStrategy, false);
    }
}
