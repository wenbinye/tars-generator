package com.github.wenbinye;

import com.github.wenbinye.domain.EnumMember;
import com.github.wenbinye.domain.FullQualifiedName;
import com.github.wenbinye.domain.Operation;
import com.github.wenbinye.domain.Parameter;
import com.github.wenbinye.domain.StructMember;
import com.github.wenbinye.domain.Type;
import com.qq.tars.maven.parse.ast.TarsEnum;
import com.qq.tars.maven.parse.ast.TarsInterface;
import com.qq.tars.maven.parse.ast.TarsNamespace;
import com.qq.tars.maven.parse.ast.TarsOperation;
import com.qq.tars.maven.parse.ast.TarsParam;
import com.qq.tars.maven.parse.ast.TarsStruct;
import org.antlr.runtime.tree.Tree;

import java.io.File;
import java.io.IOException;
import java.util.ArrayList;
import java.util.Collections;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.Optional;
import java.util.function.BiConsumer;

import static com.github.wenbinye.TarsGen.VERSION;

/**
 * @author ywb
 */
public class DefaultGenerateStrategy implements GenerateStrategy {
    public static final String TEMPLATE_DIR = "templates/";
    public static final String KEY_GENERATOR_VERSION = "generator_version";
    public static final String KEY_TARS_NAMESPACE = "tars_namespace";
    public static final String KEY_MODULE = "module";
    public static final String KEY_CONFIG = "config";
    public static final String KEY_NAMESPACE = "namespace";
    public static final String KEY_TYPE = "type";
    public static final String KEY_CLASS_NAME = "class_name";
    public static final String KEY_NAME = "name";
    public static final String KEY_MEMBERS = "members";
    public static final String KEY_SERVANT_NAME = "servant_name";
    public static final String KEY_OPERATIONS = "operations";
    public static final String KEY_CONSTANTS = "constants";

    enum ContextType {
        CONSTANT(TEMPLATE_DIR + "constant.peb", (tree, context) -> {
        }),
        ENUM(TEMPLATE_DIR + "enum.peb", (tree, context) -> {
            TarsEnum tarsEnum = (TarsEnum) tree;
            context.put(KEY_CLASS_NAME, capitalize(tarsEnum.enumName()));
            context.put(KEY_NAME, tarsEnum.enumName());
            List<EnumMember> members = new ArrayList<>(tarsEnum.enumMemberList().size());
            for (int i = 0; i < tarsEnum.enumMemberList().size(); ++i) {
                String item = tarsEnum.enumMemberList().get(i);
                String value = i < tarsEnum.enumValueList().size() ? tarsEnum.enumValueList().get(i) : String.valueOf(i);
                members.add(new EnumMember(item, value));
            }
            context.put(KEY_MEMBERS, members);
        }),
        STRUCT(TEMPLATE_DIR + "struct.peb", (tree, context) -> {
            TarsStruct tarsStruct = (TarsStruct) tree;
            context.put(KEY_CLASS_NAME, capitalize(tarsStruct.structName()));
            context.put(KEY_NAME, tarsStruct.structName());
            List<StructMember> members = StructMember.fromStruct(tarsStruct, (String) context.get("namespace"));
            context.put(KEY_MEMBERS, members);
        }),
        INTERFACE(TEMPLATE_DIR + "interface.peb", ContextType::extractInterfaceContext);

        private static final Map<Class<? extends Tree>, ContextType> CLASS_MAP = new HashMap<>();

        static {
            CLASS_MAP.put(TarsEnum.class, ENUM);
            CLASS_MAP.put(TarsStruct.class, STRUCT);
            CLASS_MAP.put(TarsInterface.class, INTERFACE);
        }

        private final String templateFile;
        private final BiConsumer<Tree, Map<String, Object>> contextExtractor;

        ContextType(String templateFile, BiConsumer<Tree, Map<String, Object>> contextExtractor) {
            this.templateFile = templateFile;
            this.contextExtractor = contextExtractor;
        }

        public static void extractInterfaceContext(Tree tree, Map<String, Object> context) {
            TarsInterface tarsInterface = (TarsInterface) tree;
            String namespace = (String) context.get(KEY_NAMESPACE);
            String module = (String) context.get(KEY_MODULE);

            context.put(KEY_CLASS_NAME, capitalize(tarsInterface.interfaceName()) + "Servant");
            context.put(KEY_NAME, tarsInterface.interfaceName());
            List<Operation> operations = new ArrayList<>(tarsInterface.operationList().size());
            for (TarsOperation tarsOperation : tarsInterface.operationList()) {
                List<Parameter> parameters = new ArrayList<>(tarsOperation.paramList().size());
                for (TarsParam tarsParam : tarsOperation.paramList()) {
                    parameters.add(new Parameter(
                            tarsParam.paramName(),
                            new Type(tarsParam.paramType(), namespace),
                            tarsParam.isOut(),
                            tarsParam.isRouteKey()
                    ));
                }
                operations.add(new Operation(
                        tarsOperation.operationName(),
                        parameters,
                        new Type(tarsOperation.retType(), namespace)
                ));
            }
            GeneratorConfig config = (GeneratorConfig) context.get("config");
            Map<String, String> servantNames = config.getServantNames();
            context.put(KEY_SERVANT_NAME,
                    Optional.ofNullable(servantNames.get(tarsInterface.interfaceName()))
                            .orElse(servantNames.getOrDefault(module + "." + tarsInterface.interfaceName(),
                                    tarsInterface.interfaceName() + "Obj")));
            context.put(KEY_OPERATIONS, operations);
        }

        public static ContextType fromElement(Tree element) {
            if (CLASS_MAP.containsKey(element.getClass())) {
                return CLASS_MAP.get(element.getClass());
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
        context.put(KEY_TYPE, ContextType.CONSTANT);
        context.put(KEY_CLASS_NAME, capitalize(namespace.namespace()) + "Const");
        context.put(KEY_CONSTANTS, namespace.constList());
        return context;
    }

    @Override
    public Map<String, Object> createContext(TarsNamespace namespace, Tree element) {
        return createContext(namespace, element, Collections.emptyMap());
    }

    private Map<String, Object> createContext(TarsNamespace namespace, Tree element, Map<String, Object> extras) {
        Map<String, Object> context = createContext(namespace);
        ContextType contextType = ContextType.fromElement(element);
        context.put(KEY_TYPE, contextType);
        context.put(KEY_CLIENT, config.isClientCode());
        context.putAll(extras);
        contextType.extractContext(element, context);
        return context;
    }

    @Override
    public File createOutputFile(Map<String, Object> context) throws IOException {
        File dir;
        if (config.isFlatNamespace()) {
            dir = config.getOutputPath().toFile();
        } else {
            dir = new File(config.getOutputPath().toFile(), (String) context.get(KEY_MODULE));
        }
        if (!dir.exists() && !dir.mkdirs()) {
            throw new IOException("cannot create directory " + dir);
        }
        return new File(dir, context.get(KEY_CLASS_NAME) + ".php");
    }

    @Override
    public String getTemplate(Map<String, Object> context) {
        ContextType contextType = (ContextType) context.get(KEY_TYPE);
        return contextType.getTemplateFile();
    }

    private Map<String, Object> createContext(TarsNamespace ns) {
        Map<String, Object> context = new HashMap<>(30);
        context.put(KEY_GENERATOR_VERSION, VERSION);
        context.put(KEY_TARS_NAMESPACE, ns);
        context.put(KEY_MODULE, ns.namespace());
        context.put(KEY_CONFIG, config);
        if (config.isFlatNamespace()) {
            context.put(KEY_NAMESPACE, config.getNamespace());
        } else {
            context.put(KEY_NAMESPACE, new FullQualifiedName(config.getNamespace(), ns.namespace()).asNamespace());
        }
        return context;
    }

    public static String capitalize(String str) {
        return String.valueOf(str.charAt(0)).toUpperCase() + str.substring(1);
    }
}
