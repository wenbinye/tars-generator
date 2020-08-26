package com.github.wenbinye.domain;

import com.github.wenbinye.exceptions.StructDefinitionException;
import com.qq.tars.maven.parse.ast.TarsStruct;
import com.qq.tars.maven.parse.ast.TarsStructMember;
import lombok.Builder;
import lombok.Getter;

import java.util.ArrayList;
import java.util.HashSet;
import java.util.List;
import java.util.Objects;
import java.util.Set;

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

    public static List<StructMember> fromStruct(TarsStruct tarsStruct, String namespace) throws StructDefinitionException {
        ArrayList<StructMember> members = new ArrayList<>(tarsStruct.memberList().size());
        int previous = -1;
        Set<String> fieldNames = new HashSet<>();
        for (TarsStructMember tarsStructMember : tarsStruct.memberList()) {
            if (tarsStructMember.tag() <= previous) {
                throw new StructDefinitionException(String.format(
                        "field %s order %d should not less than previous %d",
                        tarsStruct.structName()+"."+tarsStructMember.memberName(), tarsStructMember.tag(), previous));
            }
            if (fieldNames.contains(tarsStructMember.memberName())) {
                throw new StructDefinitionException(String.format(
                        "field %s is duplicated",
                        tarsStruct.structName()+"."+tarsStructMember.memberName()));
            }
            previous = tarsStructMember.tag();
            fieldNames.add(tarsStructMember.memberName());
            members.add(StructMember.builder()
                    .tag(tarsStructMember.tag())
                    .required(tarsStructMember.isRequire())
                    .name(tarsStructMember.memberName())
                    .defaultValue(tarsStructMember.defaultValue())
                    .type(new Type(tarsStructMember.memberType(), namespace))
                    .build());
        }

        return members;
    }

    public boolean hasDefaultValue() {
        return Objects.nonNull(defaultValue);
    }
}
