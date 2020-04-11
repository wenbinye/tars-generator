package com.github.wenbinye;

import com.qq.tars.maven.parse.ast.TarsNamespace;
import org.antlr.runtime.tree.Tree;

import java.io.File;
import java.io.IOException;
import java.util.Map;

/**
 * @author ywb
 */
public interface GenerateStrategy {
    String KEY_CLIENT = "client";

    /**
     * Creates template context for constant output
     * @param namespace
     * @return
     */
    Map<String, Object> createConstContext(TarsNamespace namespace);

    /**
     * Creates template context for enum, interface, struct etc.
     * @param namespace
     * @param element
     * @return
     */
    Map<String, Object> createContext(TarsNamespace namespace, Tree element);

    /**
     * Gets the output file name
     * @param context
     * @return
     * @throws IOException
     */
    File createOutputFile(Map<String, Object> context) throws IOException;

    /**
     * Gets the template name
     * @param context
     * @return
     */
    String getTemplate(Map<String, Object> context);
}
