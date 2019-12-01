package com.github.wenbinye.exceptions;

import org.antlr.runtime.RecognitionException;

public class ParseException extends Exception {
    public ParseException(String message, Throwable cause) {
        super(message, cause);
    }
}
