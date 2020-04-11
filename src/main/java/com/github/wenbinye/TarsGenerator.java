package com.github.wenbinye;

import com.github.wenbinye.exceptions.ParseException;
import com.mitchellbosecke.pebble.PebbleEngine;
import com.qq.tars.maven.parse.ast.TarsNamespace;
import lombok.extern.slf4j.Slf4j;
import org.antlr.runtime.tree.Tree;

import java.io.File;
import java.io.IOException;
import java.io.Reader;
import java.io.Writer;
import java.nio.file.Files;
import java.nio.file.Path;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Set;
import java.util.Stack;

/**
 * @author ywb
 */
@Slf4j
public class TarsGenerator {
    private final PebbleEngine templateEngine;

    private final GeneratorConfig config;

    private final GenerateStrategy generateStrategy;

    public TarsGenerator(PebbleEngine templateEngine, GeneratorConfig config, GenerateStrategy generateStrategy) {
        this.templateEngine = templateEngine;
        this.config = config;
        this.generateStrategy = generateStrategy;
    }

    public void generate() throws IOException, ParseException {
        Stack<File> tarsFiles = new Stack<>();
        Files.walk(config.getTarsPath())
                .filter(p -> p.toString().endsWith(".tars"))
                .map(Path::toFile)
                .filter(f -> f.isFile() && f.canRead())
                .forEach(tarsFiles::push);
        Set<File> seen = new HashSet<>();

        while (!tarsFiles.isEmpty()) {
            File file = tarsFiles.pop();
            if (seen.contains(file)) {
                continue;
            }
            seen.add(file);
            log.info("read tars file {}", file.toString());
            try (Reader reader = Files.newBufferedReader(file.toPath(), config.getCharset())) {
                TarsParser parser = TarsParser.create(reader);
                parser.parse();

                for (TarsNamespace ns : parser.getNamespaces()) {
                    generateConst(ns);
                    generate(ns, ns.enumList());
                    generate(ns, ns.structList());
                    generate(ns, ns.interfaceList());
                }
                for (String includeFile : parser.getIncludeFiles()) {
                    log.info("add include file {}", includeFile);
                    File included = new File(file.getParent(), includeFile);
                    if (!seen.contains(included)) {
                        tarsFiles.push(included);
                    }
                }
            }
        }
    }

    private void generateConst(TarsNamespace ns) throws IOException {
        if (ns.constList().isEmpty()) {
            return;
        }
        output(generateStrategy.createConstContext(ns));
    }

    private void generate(TarsNamespace ns, List<? extends Tree> elements) throws IOException {
        if (elements.isEmpty()) {
            return;
        }
        for (Tree element : elements) {
            output(generateStrategy.createContext(ns, element));
        }
    }

    private void output(Map<String, Object> context) throws IOException {
        File outputFile = generateStrategy.createOutputFile(context);
        log.info("write to {}", outputFile);
        try (Writer output = Files.newBufferedWriter(outputFile.toPath(), config.getCharset())) {
            templateEngine.getTemplate(generateStrategy.getTemplate(context))
                    .evaluate(output, context);
        }
    }
}
