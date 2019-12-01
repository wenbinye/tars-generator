package com.github.wenbinye;

import com.qq.tars.maven.parse.ast.TarsNamespace;
import org.antlr.runtime.tree.Tree;

import java.io.File;
import java.io.IOException;
import java.util.Map;

public interface GenerateStrategy {
    Map<String, Object> createConstContext(TarsNamespace namespace);

    Map<String, Object> createContext(TarsNamespace namespace, Tree element);

    File createOutputFile(Map<String, Object> context) throws IOException;

    String getTemplate(Map<String, Object> context);
}
