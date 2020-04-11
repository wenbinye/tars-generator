package com.github.wenbinye.domain;

import lombok.Builder;
import lombok.Getter;

import java.util.Objects;

/**
 * @author ywb
 */
@Getter
@Builder
public class StructMember {
    private final int tag;
    private final boolean required;
    private final String name;
    private final String defaultValue;
    private final Type type;

    public boolean hasDefaultValue() {
        return Objects.nonNull(defaultValue);
    }
}
