package com.github.wenbinye;

import lombok.Getter;
import lombok.Setter;

import java.nio.charset.Charset;
import java.nio.charset.StandardCharsets;
import java.nio.file.Path;
import java.util.HashMap;
import java.util.Map;

@Getter
@Setter
public class GeneratorConfig {
    private String namespace;

    private Path tarsPath;

    private Path outputPath;

    private Charset tarsCharset = StandardCharsets.UTF_8;

    private Charset charset = StandardCharsets.UTF_8;

    private boolean flatNamespace;

    private Map<String, String> servantNames = new HashMap<>();
}
