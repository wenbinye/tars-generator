package com.github.wenbinye;

import com.github.wenbinye.exceptions.ParseException;
import com.github.wenbinye.exceptions.StructDefinitionException;
import com.mitchellbosecke.pebble.PebbleEngine;
import org.junit.Test;

import java.io.IOException;
import java.nio.file.Paths;

public class TarsGeneratorTest {

    @Test
    public void generate() throws IOException, ParseException {
        PebbleEngine templateEngine = new PebbleEngine.Builder().build();
        GeneratorConfig config = new GeneratorConfig();
        config.setNamespace("foo");
        config.setTarsPath(Paths.get("src/test/resources/simple.tars"));
        config.setOutputPath(Paths.get("target"));

        GenerateStrategy generateStrategy = new DefaultGenerateStrategy(config);
        new TarsGenerator(templateEngine, config, generateStrategy).generate();
    }

    @Test(expected = StructDefinitionException.class)
    public void invalidStructOrder() throws IOException, ParseException {
        PebbleEngine templateEngine = new PebbleEngine.Builder().build();
        GeneratorConfig config = new GeneratorConfig();
        config.setNamespace("foo");
        config.setTarsPath(Paths.get("src/test/resources/wrong-struct.tars"));
        config.setOutputPath(Paths.get("target"));

        GenerateStrategy generateStrategy = new DefaultGenerateStrategy(config);
        new TarsGenerator(templateEngine, config, generateStrategy).generate();
    }
}