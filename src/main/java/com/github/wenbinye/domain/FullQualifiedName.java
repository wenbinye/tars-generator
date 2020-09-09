package com.github.wenbinye.domain;

import lombok.Getter;

import java.util.Objects;

/**
 * @author ywb
 */
@Getter
public class FullQualifiedName {
    public static final char NAMESPACE_DELIMITER = '\\';

    private final String namespace;
    private final String className;

    public FullQualifiedName(String namespace, String className) {
        if (Objects.nonNull(namespace) && !namespace.isEmpty()) {
            namespace = NAMESPACE_DELIMITER + trim(namespace);
        }
        this.namespace = namespace;
        this.className = trim(className);
    }

    @Override
    public String toString() {
        if (namespace == null || namespace.isEmpty()) {
            return NAMESPACE_DELIMITER + className;
        }
        return namespace + NAMESPACE_DELIMITER + className;
    }

    public String asNamespace() {
        return this.toString().substring(1);
    }

    private static String trim(String input)
    {
        return ltrim(rtrim(input));
    }

    private static String ltrim(String input) {
        int i;
        for(i = 0; i < input.length() && input.charAt(i) == NAMESPACE_DELIMITER; ++i) {
        }

        return input.substring(i);
    }

    private static String rtrim(String input) {
        int i;
        for(i = input.length() - 1; i >= 0 && input.charAt(i) == NAMESPACE_DELIMITER; --i) {
        }

        return input.substring(0, i + 1);
    }

    public static FullQualifiedName fromString(String name)
    {
        name = trim(name);
        int pos = name.lastIndexOf(NAMESPACE_DELIMITER);
        if (pos == -1) {
            return new FullQualifiedName(null, name);
        } else {
            return new FullQualifiedName(name.substring(0, pos), name.substring(pos+1));
        }
    }

    public static FullQualifiedName fromSnakeCase(String snakeCaseName)
    {
        return fromString(snakeCaseName.replace('_', NAMESPACE_DELIMITER));
    }

    public FullQualifiedName concat(FullQualifiedName module) {
        return fromString(this.toString() + module.toString());
    }
}
