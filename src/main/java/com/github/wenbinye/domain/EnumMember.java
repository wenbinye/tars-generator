package com.github.wenbinye.domain;

import lombok.Getter;

/**
 * @author ywb
 */
@Getter
public class EnumMember {
    private final String name;
    private final String value;

    public EnumMember(String name, String value) {
        this.name = name;
        this.value = value;
    }
}
