package com.github.wenbinye;

import com.github.wenbinye.domain.*;
import com.qq.tars.maven.parse.ast.*;
import org.antlr.runtime.tree.Tree;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.function.BiConsumer;

public class DefaultGenerateStrategy implements GenerateStrategy {
    public static final String TEMPLATE_DIR = "templates/";

    enum ContextType {
        CONSTANT(TEMPLATE_DIR + "constant.peb", (tree, context) -> {
        }),
        ENUM(TEMPLATE_DIR + "enum.peb", (tree, context) -> {
            TarsEnum tarsEnum = (TarsEnum) tree;
            context.put("class_name", capitalize(tarsEnum.enumName()));
            context.put("name", tarsEnum.enumName());
            List<EnumMember> members = new ArrayList<>(tarsEnum.enumMemberList().size());
            for (int i = 0; i < tarsEnum.enumMemberList().size(); ++i) {
                String item = tarsEnum.enumMemberList().get(i);
                String value = i < tarsEnum.enumValueList().size() ? tarsEnum.enumValueList().get(i) : String.valueOf(i);
                members.add(new EnumMember(item, value));
            }
            context.put("members", members);
        }),
        STRUCT(TEMPLATE_DIR + "struct.peb", (tree, context) -> {
            TarsStruct tarsStruct = (TarsStruct) tree;
            context.put("class_name", capitalize(tarsStruct.structName()));
            context.put("name", tarsStruct.structName());
            List<StructMember> members = new ArrayList<>(tarsStruct.memberList().size());
            for (TarsStructMember tarsStructMember : tarsStruct.memberList()) {
                members.add(StructMember.builder()
                        .tag(tarsStructMember.tag())
                        .required(tarsStructMember.isRequire())
                        .name(tarsStructMember.memberName())
                        .defaultValue(tarsStructMember.defaultValue())
                        .type(new Type(tarsStructMember.memberType(), (String) context.get("namespace")))
                        .build());
            }
            context.put("members", members);
        }),
        INTERFACE(TEMPLATE_DIR + "interface.peb", (tree, context) -> {
            TarsInterface tarsInterface = (TarsInterface) tree;
            context.put("class_name", capitalize(tarsInterface.interfaceName()) + "Servant");
            context.put("name", tarsInterface.interfaceName());
            List<Operation> operations = new ArrayList<>(tarsInterface.operationList().size());
            for (TarsOperation tarsOperation : tarsInterface.operationList()) {
                List<Parameter> parameters = new ArrayList<>(tarsOperation.paramList().size());
                for (TarsParam tarsParam : tarsOperation.paramList()) {
                    parameters.add(new Parameter(
                            tarsParam.paramName(),
                            new Type(tarsParam.paramType(), (String) context.get("namespace")),
                            tarsParam.isOut(),
                            tarsParam.isRouteKey()
                    ));
                }
                operations.add(new Operation(
                        tarsOperation.operationName(),
                        parameters,
                        new Type(tarsOperation.retType(), (String) context.get("namespace"))
                ));
            }
            context.put("operations", operations);
        });

        private static final Map<Class<? extends Tree>, ContextType> classMap = new HashMap<>();

        static {
            classMap.put(TarsEnum.class, ENUM);
            classMap.put(TarsStruct.class, STRUCT);
            classMap.put(TarsInterface.class, INTERFACE);
        }

        private final String templateFile;
        private final BiConsumer<Tree, Map<String, Object>> contextExtractor;

        ContextType(String templateFile, BiConsumer<Tree, Map<String, Object>> contextExtractor) {
            this.templateFile = templateFile;
            this.contextExtractor = contextExtractor;
        }

        public static ContextType fromElement(Tree element) {
            if (classMap.containsKey(element.getClass())) {
                return classMap.get(element.getClass());
            }
            throw new IllegalArgumentException("Cannot find context type for " + element.getClass());
        }

        public String getTemplateFile() {
            return templateFile;
        }

        public void extractContext(Tree tree, Map<String, Object> context) {
            this.contextExtractor.accept(tree, context);
        }
    }

    private final GeneratorConfig config;

    public DefaultGenerateStrategy(GeneratorConfig config) {
        this.config = config;
    }

    @Override
    public Map<String, Object> createConstContext(TarsNamespace namespace) {
        Map<String, Object> context = createContext(namespace);
        context.put("type", ContextType.CONSTANT);
        context.put("class_name", capitalize(namespace.namespace()) + "Const");
        context.put("constants", namespace.constList());
        return context;
    }

    @Override
    public Map<String, Object> createContext(TarsNamespace namespace, Tree element) {
        Map<String, Object> context = createContext(namespace);
        ContextType contextType = ContextType.fromElement(element);
        context.put("type", contextType);
        context.put("element", element);
        contextType.extractContext(element, context);
        return context;
    }

    @Override
    public File createOutputFile(Map<String, Object> context) throws IOException {
        File dir;
        if (config.isFlatNamespace()) {
            dir = config.getOutputPath().toFile();
        } else {
            dir = new File(config.getOutputPath().toFile(), (String) context.get("module"));
        }
        if (!dir.exists() && !dir.mkdirs()) {
            throw new IOException("cannot create directory " + dir);
        }
        return new File(dir, context.get("class_name") + ".php");
    }

    @Override
    public String getTemplate(Map<String, Object> context) {
        ContextType contextType = (ContextType) context.get("type");
        return contextType.getTemplateFile();
    }

    private Map<String, Object> createContext(TarsNamespace ns) {
        Map<String, Object> context = new HashMap<>();
        context.put("tars_namespace", ns);
        context.put("module", ns.namespace());
        if (config.isFlatNamespace()) {
            context.put("namespace", config.getNamespace());
        } else {
            context.put("namespace", new FullQualifiedName(config.getNamespace(), ns.namespace()).asNamespace());
        }
        return context;
    }

    public static String capitalize(String str) {
        return String.valueOf(str.charAt(0)).toUpperCase() + str.substring(1);
    }
}
