package com.github.wenbinye.domain;

import lombok.Getter;

import java.util.List;

@Getter
public class Operation {
    private final String name;
    private final List<Parameter> parameters;
    private final Type returnType;

    public Operation(String name, List<Parameter> parameters, Type returnType) {
        this.name = name;
        this.parameters = parameters;
        this.returnType = returnType;
    }
}
