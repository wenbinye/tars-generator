package com.github.wenbinye.domain;

import lombok.Getter;

@Getter
public class ReturnValue {
    private final String name;
    private final Type type;

    public ReturnValue(String name, Type type) {
        this.name = name;
        this.type = type;
    }
}
