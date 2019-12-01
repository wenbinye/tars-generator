package com.github.wenbinye;

import com.github.wenbinye.exceptions.ParseException;
import com.mitchellbosecke.pebble.PebbleEngine;
import org.junit.Test;

import java.io.IOException;
import java.nio.file.Paths;

import static org.junit.Assert.*;

public class TarsGeneratorTest {

    @Test
    public void generate() throws IOException, ParseException {
        PebbleEngine templateEngine = new PebbleEngine.Builder().build();
        GeneratorConfig config = new GeneratorConfig();
        config.setNamespace("foo");
        config.setTarsPath(Paths.get("src/test/resources"));
        config.setOutputPath(Paths.get("target"));

        GenerateStrategy generateStrategy = new DefaultGenerateStrategy(config);
        new TarsGenerator(templateEngine, config, generateStrategy).generate();
    }
}