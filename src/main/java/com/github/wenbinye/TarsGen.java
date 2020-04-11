package com.github.wenbinye;

import com.mitchellbosecke.pebble.PebbleEngine;
import com.mitchellbosecke.pebble.loader.ClasspathLoader;
import com.mitchellbosecke.pebble.loader.DelegatingLoader;
import com.mitchellbosecke.pebble.loader.FileLoader;
import com.mitchellbosecke.pebble.loader.Loader;
import picocli.CommandLine;
import picocli.CommandLine.Command;
import picocli.CommandLine.Option;

import java.io.IOException;
import java.nio.charset.Charset;
import java.nio.file.Path;
import java.util.ArrayList;
import java.util.Collections;
import java.util.List;
import java.util.Map;
import java.util.Objects;
import java.util.Optional;
import java.util.concurrent.Callable;

import static com.github.wenbinye.TarsGen.VERSION;

@Command(name = "gen", mixinStandardHelpOptions = true, version = VERSION,
        description = "Generate PHP Code from Tars file.")
class TarsGen implements Callable<Integer> {
    public static final String VERSION = "1.0-SNAPSHOT";

    @Option(names = {"-o", "--output-path"}, description = "output path", required = true)
    private Path outputPath;

    @Option(names = {"-t", "--tars-path"}, description = "tars file path", required = true)
    private Path tarsPath;

    @Option(names = {"-n", "--namespace"}, description = "php class namespace")
    private String namespace;

    @Option(names = {"-s", "--servant"}, description = "interface name to servant name")
    private Map<String, String> servantNames;

    @Option(names = {"--client"}, description = "generate client class")
    private boolean clientCode;

    @Option(names = {"-c", "--charset"}, description = "tars file charset")
    private String tarsCharset;

    @Option(names = {"-T", "--template"}, description = "The templates path")
    private String templatePath;

    @Option(names = {"-C", "--output-charset"}, description = "output file charset")
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
        PebbleEngine.Builder builder = new PebbleEngine.Builder();
        if (templatePath != null && !templatePath.isEmpty()) {
            builder.loader(createTemplateLoader());
        }
        PebbleEngine templateEngine = builder.build();
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
        config.setClientCode(this.clientCode);

        if (Objects.nonNull(tarsCharset) && !tarsCharset.isEmpty()) {
            checkCharset(tarsCharset);
            config.setTarsCharset(Charset.forName(tarsCharset));
        }
        if (Objects.nonNull(charset) && !charset.isEmpty()) {
            checkCharset(charset);
            config.setCharset(Charset.forName(charset));
        }

        config.setFlatNamespace(flatNamespace);
        config.setServantNames(Optional.ofNullable(servantNames).orElse(Collections.emptyMap()));

        GenerateStrategy generateStrategy = new DefaultGenerateStrategy(config);
        new TarsGenerator(templateEngine, config, generateStrategy).generate();
        return 0;
    }

    private DelegatingLoader createTemplateLoader() {
        List<Loader<?>> defaultLoadingStrategies = new ArrayList<>();
        FileLoader fileLoader = new FileLoader();
        fileLoader.setPrefix(templatePath);
        defaultLoadingStrategies.add(fileLoader);
        defaultLoadingStrategies.add(new FileLoader());
        defaultLoadingStrategies.add(new ClasspathLoader());
        return new DelegatingLoader(defaultLoadingStrategies);
    }

    private void checkCharset(String charset) {
        if (!Charset.availableCharsets().containsKey(charset)) {
            throw new IllegalArgumentException("unknown charset " + charset);
        }
    }
}