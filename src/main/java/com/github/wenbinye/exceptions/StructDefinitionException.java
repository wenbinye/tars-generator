package com.github.wenbinye.exceptions;

import com.qq.tars.maven.parse.ast.TarsStruct;

/**
 * @author ywb
 */
public class StructDefinitionException extends RuntimeException {
    public StructDefinitionException(String message) {
        super(message);
    }
}
