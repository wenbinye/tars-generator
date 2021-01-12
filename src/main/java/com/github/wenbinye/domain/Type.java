package com.github.wenbinye.domain;

import com.qq.tars.maven.parse.ast.TarsMapType;
import com.qq.tars.maven.parse.ast.TarsPrimitiveType;
import com.qq.tars.maven.parse.ast.TarsPrimitiveType.PrimitiveType;
import com.qq.tars.maven.parse.ast.TarsType;
import com.qq.tars.maven.parse.ast.TarsVectorType;

import java.util.HashMap;
import java.util.Map;

/**
 * @author ywb
 */
public class Type {
    private static final Map<PrimitiveType, String> PRIMITIVE_TYPES = new HashMap<>();

    static {
        PRIMITIVE_TYPES.put(PrimitiveType.VOID, "void");
        PRIMITIVE_TYPES.put(PrimitiveType.BOOL, "bool");
        PRIMITIVE_TYPES.put(PrimitiveType.BYTE, "string");
        PRIMITIVE_TYPES.put(PrimitiveType.SHORT, "int");
        PRIMITIVE_TYPES.put(PrimitiveType.INT, "int");
        PRIMITIVE_TYPES.put(PrimitiveType.LONG, "int");
        PRIMITIVE_TYPES.put(PrimitiveType.FLOAT, "float");
        PRIMITIVE_TYPES.put(PrimitiveType.DOUBLE, "double");
        PRIMITIVE_TYPES.put(PrimitiveType.STRING, "string");
    }

    private final TarsType tarsType;

    private final String namespace;

    public Type(TarsType tarsType, String namespace) {
        this.tarsType = tarsType;
        this.namespace = namespace;
    }

    @Override
    public String toString() {
        if (tarsType.isVector()) {
            TarsVectorType vectorType = (TarsVectorType) this.tarsType;
            return "vector<" + createType(vectorType.subType()).toString() + ">";
        }
        if (tarsType.isMap()) {
            TarsMapType mapType = (TarsMapType) this.tarsType;
            return String.format("map<%s, %s>", createType(mapType.keyType()), createType(mapType.valueType()));
        }
        return tarsType.isPrimitive() ? tarsType.typeName().toLowerCase() : tarsType.typeName();
    }

    public boolean isVoid() {
        return tarsType.isPrimitive() && tarsType.asPrimitive().isVoid();
    }

    private Type createType(TarsType tarsType) {
        return new Type(tarsType, namespace);
    }

    public String getPhpType() {
        if (tarsType.isPrimitive()) {
            TarsPrimitiveType tarsType = (TarsPrimitiveType) this.tarsType;
            return PRIMITIVE_TYPES.get(tarsType.primitiveType());
        }
        if (tarsType.isVector()) {
            return createType(tarsType.asVector().subType()).getPhpType() + "[]";
        }
        if (tarsType.isMap()) {
            if (tarsType.asMap().keyType().isCustom()) {
                return "\\wenbinye\\tars\\protocol\\type\\StructMap";
            } else {
                return createType(tarsType.asMap().valueType()).getPhpType() + "[]";
            }
        }
        if (tarsType.isCustom()) {
            return new FullQualifiedName(namespace, tarsType.typeName()).toString();
        }
        throw new IllegalStateException("unknown type " + tarsType.typeName());
    }

    public String getPhpParameterType() {
        return this.hasPhpParameterType() ? this.getPhpType() : "";
    }

    public boolean hasPhpParameterType() {
        return true;
    }
}
