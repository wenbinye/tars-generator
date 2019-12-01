package com.github.wenbinye.domain;

import lombok.Getter;

import java.util.Objects;

@Getter
public class FullQualifiedName {
    public static final String NAMESPACE_DELIMITER = "\\";

    private final String namespace;
    private final String className;

    public FullQualifiedName(String namespace, String className) {
        if (Objects.nonNull(namespace) && !namespace.isEmpty()) {
            if (!namespace.startsWith(NAMESPACE_DELIMITER)) {
                namespace = NAMESPACE_DELIMITER + namespace;
            }
            if (namespace.endsWith(NAMESPACE_DELIMITER)) {
                namespace = namespace.substring(0, namespace.length() - 1);
            }
        }
        this.namespace = namespace;
        this.className = className;
    }

    @Override
    public String toString() {
        return namespace + NAMESPACE_DELIMITER + className;
    }

    public String asNamespace() {
        return this.toString().substring(1);
    }
}
