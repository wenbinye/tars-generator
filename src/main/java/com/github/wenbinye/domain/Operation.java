package com.github.wenbinye.domain;

import lombok.Getter;

import java.util.*;
import java.util.stream.Collectors;

@Getter
public class Operation {
    private final String name;
    private final List<Parameter> parameters;
    private final List<Parameter> callParameters;
    private final Type returnType;
    private final List<ReturnValue> returnValues;
    private final ReturnValue returnValue;

    public Operation(String name, List<Parameter> parameters, Type returnType) {
        this.name = name;
        this.parameters = parameters;
        this.returnType = returnType;
        this.callParameters = parameters.stream().filter(parameter -> !parameter.isOut())
                .collect(Collectors.toList());
        Set<String> names = new HashSet<>();
        this.returnValues = parameters.stream().filter(Parameter::isOut)
                .peek(p -> names.add(p.getName()))
                .map(p -> new ReturnValue(p.getName(), p.getType()))
                .collect(Collectors.toList());
        if (returnType.isVoid()) {
            returnValue = null;
        } else {
            String retName = "";
            for (int i = 0; i < Integer.MAX_VALUE; i++) {
                retName = "ret" + (i == 0 ? "" : String.valueOf(i));
                if (!names.contains(retName)) {
                    break;
                }
            }
            returnValue = new ReturnValue(retName, returnType);
            this.returnValues.add(returnValue);
        }
    }

    public List<Parameter> getCallParameters() {
        return callParameters;
    }

    public boolean hasCallParameters() {
        return !callParameters.isEmpty();
    }

    public List<ReturnValue> getReturnValues() {
        return returnValues;
    }

    public boolean hasReturnValues() {
        return !getReturnValues().isEmpty();
    }

    public boolean hasReturnValue() {
        return Objects.nonNull(returnValue);
    }
}
