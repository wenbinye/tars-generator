package com.github.wenbinye.domain;

import lombok.Getter;

@Getter
public class Parameter {
    private final String name;
    private final Type type;
    private final boolean out;
    private final boolean routeKey;

    public Parameter(String name, Type type, boolean out, boolean routeKey) {
        this.name = name;
        this.type = type;
        this.out = out;
        this.routeKey = routeKey;
    }
}
