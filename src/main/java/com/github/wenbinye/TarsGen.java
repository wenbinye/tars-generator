package com.github.wenbinye;

import com.mitchellbosecke.pebble.PebbleEngine;
import picocli.CommandLine;
import picocli.CommandLine.Command;
import picocli.CommandLine.Option;

import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.file.Path;
import java.util.Objects;
import java.util.Optional;
import java.util.concurrent.Callable;

@Command(name = "gen", mixinStandardHelpOptions = true, version = "1.0",
        description = "Generate PHP Code from Tars file.")
class TarsGen implements Callable<Integer> {

    @Option(names = {"-o", "--output-path"}, description = "output path", required = true)
    private Path outputPath;

    @Option(names = {"-t", "--tars-path"}, description = "tars file path", required = true)
    private Path tarsPath;

    @Option(names = {"-n", "--namespace"}, description = "php class namespace")
    private String namespace;

    @Option(names = {"-e", "--tars-charset"}, description = "tars file charset")
    private String tarsCharset;

    @Option(names = {"-c", "--charset"}, description = "output file charset")
    private String charset;

    @Option(names = {"-f", "--flat-namespace"}, description = "if true, add tars module namespace to generate class")
    private boolean flatNamespace;

    // this example implements Callable, so parsing, error handling and handling user
    // requests for usage help or version help can be done with one line of code.
    public static void main(String... args) {
        int exitCode = new CommandLine(new TarsGen()).execute(args);
        System.exit(exitCode);
    }

    @Override
    public Integer call() throws Exception {
        PebbleEngine templateEngine = new PebbleEngine.Builder().build();
        GeneratorConfig config = new GeneratorConfig();
        config.setNamespace(Optional.ofNullable(this.namespace).orElse(""));
        if (!this.outputPath.toFile().exists()
                && !this.outputPath.toFile().mkdirs()) {
            throw new IOException("Cannot create output directory " + this.outputPath);
        }
        config.setOutputPath(this.outputPath);
        if (!this.tarsPath.toFile().exists()) {
            throw new IOException("Tars path '" + this.tarsPath + "' does not exist");
        }
        config.setTarsPath(this.tarsPath);

        if (Objects.nonNull(tarsCharset) && !tarsCharset.isEmpty()) {
            checkCharset(tarsCharset);
            config.setTarsCharset(Charset.forName(tarsCharset));
        }
        if (Objects.nonNull(charset) && !charset.isEmpty()) {
            checkCharset(charset);
            config.setCharset(Charset.forName(charset));
        }

        config.setFlatNamespace(flatNamespace);

        GenerateStrategy generateStrategy = new DefaultGenerateStrategy(config);
        new TarsGenerator(templateEngine, config, generateStrategy).generate();
        return 0;
    }

    private void checkCharset(String charset) {
        if (!Charset.availableCharsets().containsKey(charset)) {
            throw new IllegalArgumentException("unknown charset " + charset);
        }
    }
}