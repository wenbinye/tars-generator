package com.github.wenbinye;

import com.github.wenbinye.exceptions.ParseException;
import com.qq.tars.maven.parse.TarsLexer;
import com.qq.tars.maven.parse.ast.TarsInclude;
import com.qq.tars.maven.parse.ast.TarsNamespace;
import com.qq.tars.maven.parse.ast.TarsRoot;
import org.antlr.runtime.ANTLRReaderStream;
import org.antlr.runtime.CharStream;
import org.antlr.runtime.CommonTokenStream;
import org.antlr.runtime.RecognitionException;

import java.io.IOException;
import java.io.Reader;
import java.util.*;

public class TarsParser {
    public static final String INCLUDE_FILE_SUFFIX = "\".tars";
    private final Map<String, TarsNamespace> namespaces = new HashMap<>();
    private final List<String> includeFiles = new ArrayList<>();

    private final CharStream input;

    private TarsParser(CharStream input) {
        this.input = input;
    }

    public void parse() throws ParseException {
        TarsLexer tarsLexer = new TarsLexer(input);
        CommonTokenStream tokens = new CommonTokenStream(tarsLexer);
        com.qq.tars.maven.parse.TarsParser tarsParser = new com.qq.tars.maven.parse.TarsParser(tokens);
        try {
            TarsRoot root = (TarsRoot) tarsParser.start().getTree();
            root.setTokenStream(tokens);
            for (TarsInclude tarsInclude : root.includeFileList()) {
                includeFiles.add(fixIncludeFile(tarsInclude.fileName()));
            }

            for (TarsNamespace ns : root.namespaceList()) {
                copy(ns, namespaces.computeIfAbsent(ns.namespace(),
                        (k) -> new TarsNamespace(ns.getType(), k)));
            }
        } catch (RecognitionException e) {
            throw new ParseException("parse fail", e);
        }
    }

    private String fixIncludeFile(String fileName) {
        if (fileName.startsWith("\"")) {
            fileName = fileName.substring(1);
        }
        if (fileName.endsWith(INCLUDE_FILE_SUFFIX)) {
            fileName = fileName.substring(0, fileName.length() - INCLUDE_FILE_SUFFIX.length());
        }
        return fileName;
    }

    public Collection<TarsNamespace> getNamespaces() {
        return namespaces.values();
    }

    public List<String> getIncludeFiles() {
        return includeFiles;
    }

    private void copy(TarsNamespace src, TarsNamespace dest) {
        src.constList().forEach(dest::addChild);
        src.enumList().forEach(dest::addChild);
        src.structList().forEach(dest::addChild);
        src.interfaceList().forEach(dest::addChild);
        src.keyMap().values().forEach(dest::addChild);
    }

    public static TarsParser create(Reader reader) throws IOException {
        return new TarsParser(new ANTLRReaderStream(reader));
    }
}
