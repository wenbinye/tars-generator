---
title: feat: TARS 文件 OpenRPC 元数据扩展
type: feat
status: completed
date: 2026-04-23
origin: docs/brainstorms/2026-04-23-tars-openrpc-metadata-extension-requirements.md
---

# feat: TARS 文件 OpenRPC 元数据扩展

## Overview

在现有 `.tars` 文件的 interface operation 声明前，支持 PHPDoc 风格的 docblock，解析提取 summary、description、`@throws` 错误码、`@param` 参数描述，生成符合 `openrpc-service-example.php` 规范的 PHP 服务类 PHPDoc 注释。

## Problem Frame

tars-generator 现有 JSON-RPC 模式生成的 PHP 接口缺少 OpenRPC 规范所需的元数据（description、errors、param descriptions），导致 JSON-RPC 服务无法通过 OpenRPC JSON 文档实现自动服务发现。本功能将元数据写入生成的 PHPDoc，运行时库可据此生成 OpenRPC 文档。

## Requirements Trace

- R1. 现有无 docblock 的 `.tars` 文件生成的 PHP 代码完全不变
- R2. 新增 docblock 的 `.tars` 文件能正确提取 summary、description、@throws、@param 描述
- R3. 生成的 PHPDoc 格式与 `openrpc-service-example.php` 一致
- R4. `@throws` 类名自动补全前导 `\`，code 部分透传
- R5. **生成的 PHP 方法签名**中，有默认值的参数（如 `$page = 1`）对应 OpenRPC `required: false`；无默认值的参数对应 `required: true`（此为文档生成行为的说明；本计划不修改 TARS 格式或生成器以显式表达 required，required 由运行时库在生成 OpenRPC JSON 时根据 PHP 签名默认值自行判断）
- R6. 单元测试覆盖 DocBlock 解析增强逻辑
- R7. `/** */` 被识别为 docblock，`/* */` 普通块注释不触发元数据

## Scope Boundaries

- 不生成独立的 OpenRPC JSON 文档文件
- 不支持 `.orpc` 独立文件格式
- 不支持参数行内 trailing comment 语法
- 不修改 tars 协议模板（仅修改 jsonrpc 模板）

## Context & Research

### Relevant Code and Patterns

- `src/domain/DocBlock.php` — 现有 DocBlock 是 `Iterator<int, string|null>` 接口实现，内部使用 `ArrayIterator<int, string|null> $lines`，可直接 foreach 遍历。关键：现有 `preg_replace('#@(var|return|param)\s+#', '@tars-\1 ', ...)` 只做 `@var/@return/@param` 前缀规范化，`@throws` 不被改写，原样保留在 `$lines` 中
- `src/TarsGeneratorListener.php:enterOperation()` — 读取 HIDDEN channel 的第一个 hidden token 作为 docblock。现有代码无 `/**` 开头判断
- `resources/views/jsonrpc/interface.twig` — 遍历 `operation.docBlock` 逐行渲染 `@param`，在 docblock 行之后独立重新生成 `@param` 标签
- `src/parse/Tars.g4:152` — `BlockComment : '/*' .*? '*/' -> channel(HIDDEN);` — `/** */` 和 `/* */` 均为 BlockComment token，无语法层面区分
- `tests/TarsGeneratorTest.php` — 使用 `assertStringEqualsFile` 对比 `tests/fixtures/generated/*.php` 快照

### Architecture Notes from Research

1. **DocBlock 新增结构化访问方法** — 新增 `getSummary()`、`getDescription()`、`getThrows()` 在 DocBlock 自身（解析 ArrayIterator `$lines`）；TarsOperation 持有这些方法调用的结果作为结构化属性（summary/description/throws），两者配合工作
2. **`@param` 描述冲突** — 模板对每个参数独立生成 `@param`，但 docblock 中的 `@param` 描述是原始文本。OpenRPC 描述应优先展示；模板 `@param` 标签应改为在有描述时附加 `$description` 文本
3. **BlockComment token 歧义** — 需在 listener 中添加 `str_starts_with($text, '/**')` 运行时检查

## Key Technical Decisions

- **解析 @param 描述的时机**：在 `TarsGeneratorListener.enterOperation()` 中直接从原始 docblock 文本用正则提取 `@param $name description`，**在调用 `DocBlock::create()` 之前**完成。理由：`DocBlock::create()` 将 `@param Type $name desc` 规范化为 `@tars-param Type $name desc`，前缀被改写，且 description 文本的边界需要原始文本来定位，必须从原始文本提前提取
- **DocBlock 扩展方式**：新增 `getSummary()`、`getDescription()`、`getThrows()` 方法扫描已有的规范化 lines 数组，不改变现有 `create()` 行为
- **模板渲染策略**：模板优先使用 TarsOperation/TarsParameter 上的结构化属性（`summary`、`description`、`paramDescriptions`、`throws`）渲染 PHPDoc；若不存在则降级到现有的 `docBlock` 逐行渲染逻辑
- **`/**` vs `/*` 区分**：在 `enterOperation()` 中添加运行时检查，token 文本不以 `/**` 开头则跳过

## Open Questions

### Resolved During Planning

- **@throws 输出格式**：不需要反引号，`@throws \ExceptionClass $40001 "message"`（用户确认）
- **required 判断来源**：通过生成的 PHP 方法签名推断，TARS 格式本身无需支持默认值语法（用户确认）
- **openrpc_metadata 配置开关**：不添加，docblock 是否存在即可决定是否激活（已从需求中删除）

### Deferred to Implementation

- `getSummary()`/`getDescription()` 内部解析算法的精确实现（空行分隔的具体边界情况）：当 summary 与 @tag 之间无空行分隔时的行为定义

## Implementation Units

- [ ] **Unit 1: DocBlock.php 扩展 — 新增结构化访问方法**

**Goal:** 新增 `getSummary()`、`getDescription()`、`getThrows()` 方法，解析规范化后的 lines 数组，提取 OpenRPC 所需的元数据

**Requirements:** R2, R3, R6

**Dependencies:** 无

**Files:**
- Modify: `src/domain/DocBlock.php`
- Test: `tests/domain/DocBlockTest.php`（新建）

**Approach:**
- 扫描规范化后的 `$this->lines` 数组
- `getSummary()`：返回第一行（第一行即 summary，与 openrpc-service-example.php 示例一致）
- `getDescription()`：返回第一个空行之后的所有非标签行，拼接为一个字符串
- `getThrows()`：正则匹配 `@throws` 行（`create()` **不**规范化 `@throws`，仅 `@var/@return/@param` 被加 `@tars-` 前缀），解析出 `['class' => ..., 'code' => ..., 'message' => ...]`

**Technical design:**

```php
/**
 * @return array<int, array{class: string, code: string, message: string}>
 */
public function getThrows(): array
{
    $throws = [];
    foreach ($this->lines as $line) {
        // 匹配 @throws ClassName $code "message"（create() 不规范化 @throws）
        if (preg_match('#^@throws\s+([\\\\\w]+)\s+\$(\d+)\s+"(.*)"#', $line, $matches)) {
            $throws[] = [
                'class' => $matches[1],
                'code' => $matches[2],
                'message' => $matches[3],
            ];
        }
    }
    return $throws;
}

public function getDescription(): string
{
    $lines = [];
    $pastFirstEmpty = false;
    foreach ($this->lines as $line) {
        if (str_starts_with($line, '@')) {
            break; // 遇到第一个标签行停止
        }
        if ('' === $line) {
            $pastFirstEmpty = true;
            continue;
        }
        if ($pastFirstEmpty) {
            $lines[] = $line;
        }
    }
    return implode("\n", $lines);
}

public function getSummary(): ?string
{
    // 第一行非空非标签内容
    foreach ($this->lines as $line) {
        if ('' !== $line && !str_starts_with($line, '@')) {
            return $line;
        }
    }
    return null;
}
```

**Patterns to follow:** 现有 `DocBlock` 的行遍历模式、PHPUnit 测试风格（`test<Scenario>` 命名）

**Test scenarios:**
- Happy path: 带完整 docblock（含 summary、description、@throws）的解析结果
- Edge case: 仅有一行 summary（无空行分隔）的 docblock
- Edge case: 有 description 但无 summary
- Edge case: 多行 description
- Edge case: 多个 @throws 注解
- Edge case: @throws 异常类名带前导 `\`（已规范化的 `@tars-throws \ClassName`）
- Edge case: 无 docblock（空 DocBlock 对象）
- Error path: 畸形 @throws 行（无引号的 message）

**Verification:**
- `phpunit tests/domain/DocBlockTest.php` 全量通过
- 新方法返回类型正确（`?string`、`array`）
- **Fallback 分支兼容性**：当 `operation.docBlock` 为 null 时，模板输出与当前行为完全一致（无多余空行），R1 兼容性由集成测试保证

---

- [ ] **Unit 2: TarsOperation.php / TarsParameter.php — 新增元数据属性**

**Goal:** 为 TarsOperation 和 TarsParameter 添加存储 OpenRPC 元数据的属性

**Requirements:** R2, R3

**Dependencies:** Unit 1

**Files:**
- Modify: `src/domain/TarsOperation.php`
- Modify: `src/domain/TarsParameter.php`

**Approach:**
- `TarsOperation`: 新增 `?string $summary`、`?string $description`、`?array $throws`、`array<string, string> $paramDescriptions` 属性；新增 `setSummary()`、`setDescription()`、`setThrows()`、`setParamDescriptions()` setter 方法；新增 `hasMetadata(): bool` 方法（任一属性非空则返回 true）
- `TarsParameter`: 新增 `?string $description` 属性和 `setDescription()` setter

**Patterns to follow:** 现有 `TarsOperation` 的 `docBlock` 属性模式（`?DocBlock`）

**Test scenarios:**
- Happy path: 各属性正常设置和读取，hasMetadata() 在有元数据时返回 true
- Edge case: 元数据为 null 时 hasMetadata() 返回 false（触发模板降级）
- Edge case: 仅设置部分属性（其他为 null）时 hasMetadata() 返回 true

**Verification:**
- `phpunit` 全量通过（集成在 Unit 5 的集成测试中）

---

- [ ] **Unit 3: TarsGeneratorListener.php — docblock 解析增强**

**Goal:** 在 `enterOperation()` 中从 docblock 提取元数据，填充 Unit 2 新增的属性；添加 `/**` 开头检查

**Requirements:** R2, R3, R7

**Dependencies:** Unit 1, Unit 2

**Files:**
- Modify: `src/TarsGeneratorListener.php`

**Approach:**
1. 读取 hidden token 文本，检查 `str_starts_with(trim($text), '/**')`，否则跳过
2. 创建 `DocBlock::create($rawText)` 规范化对象
3. **从原始文本用正则直接提取 `@param $name description`**，填充 `TarsParameter.description` 和 `TarsOperation.paramDescriptions`（在调用 `create()` 之前完成）
4. 从规范化 DocBlock 调用 `getSummary()`、`getDescription()`、`getThrows()`，填充 `TarsOperation` 属性
5. `@throws` 类名若无前导 `\` 补全之

**Technical design:**

```php
// 1. docblock 有效性检查
$rawDoc = $docs[0]->getText() ?? '';
if (!str_starts_with(trim($rawDoc), '/**')) {
    $operation->setDocBlock(null);
    return;
}

// 2. 从原始文本提取 @param 描述（在 DocBlock::create() 之前）
$paramDescriptions = [];
if (preg_match_all('/@param\s+\S+\s+\$(\w+)\s+(.+)/', $rawDoc, $matches, PREG_SET_ORDER)) {
    foreach ($matches as $m) {
        $paramDescriptions[$m[1]] = trim($m[2]);
    }
}

// 3. 填充到 TarsParameter
foreach ($operation->getParameters() as $param) {
    if (isset($paramDescriptions[$param->getName()])) {
        $param->setDescription($paramDescriptions[$param->getName()]);
    }
}

// 4. 创建规范化 DocBlock 并提取元数据
$docBlock = DocBlock::create($rawDoc);
$operation->setDocBlock($docBlock);
$operation->setSummary($docBlock->getSummary());
$operation->setDescription($docBlock->getDescription());
$throws = $docBlock->getThrows();
foreach ($throws as &$t) {
    if (!str_starts_with($t['class'], '\\')) {
        $t['class'] = '\\' . $t['class'];
    }
}
$operation->setThrows($throws);
$operation->setParamDescriptions($paramDescriptions);
```

**Patterns to follow:** 现有 `enterOperation()` 模式

**Test scenarios:**
- Happy path: 带完整 docblock 的 operation 正确提取所有元数据
- Edge case: 仅 `/* 普通注释 */`（非 docblock）不触发元数据
- Edge case: `@param` 描述与 TarsParameter 正确匹配
- Edge case: `@throws` 类名补全前导 `\`
- Edge case: 无 docblock 的 operation 降级行为

**Verification:**
- 新增 fixture `tests/fixtures/openrpc-metadata.tars` 含完整 docblock，验证生成输出
- 现有 fixture `tests/fixtures/servant/interface.tars` 生成的 PHP 代码完全不变（R1）

---

- [ ] **Unit 4: jsonrpc/interface.twig — PHPDoc 增强渲染**

**Goal:** 模板使用结构化元数据渲染增强的 PHPDoc

**Requirements:** R2, R3, R4

**Dependencies:** Unit 2, Unit 3

**Files:**
- Modify: `resources/views/jsonrpc/interface.twig`

**Approach:**
- 若 `operation.summary` 或 `operation.description` 存在，使用结构化数据渲染 PHPDoc
- `@param` 标签改为：先输出类型声明，`$description` 存在时附加描述文本
- `@throws` 标签：从 `operation.throws` 数组渲染
- 若无结构化元数据，降级到现有逐行渲染逻辑
- 使用 `| escape` 替代 `| raw` 防止 XSS；增强分支所有输出字段均经过 `| escape` 转义
- **Fallback 分支保留 `| raw`**：兼容现有 docBlock 原始内容（可能包含已在输入中正确转义的特殊字符），不做二次转义以避免破坏现有行为

**Technical design:**

```twig
{% if operation.hasMetadata() %}
    /**
{% if operation.summary %}
     * {{ operation.summary | escape }}
{% endif %}
{% if operation.description %}
{% for line in operation.description|split('\n') %}
     * {{ line | escape }}
{% endfor %}
{% if operation.throws or operation.parameters|length > 0 %}
     *
{% endif %}
{% endif %}
     *
{% for param in operation.parameters %}
{% if param.description %}
     * @param {{ param.type.docBlockType | raw }} ${{ param.name }} {{ param.description | escape }}
{% else %}
     * @param {{ param.type.docBlockType | raw }} ${{ param.name }}
{% endif %}
{% endfor %}
     * @return {{ operation.returnType.docBlockType | raw }}
{% if operation.throws %}
{% for throws in operation.throws %}
     * @throws {{ throws.class | escape }} ${{ throws.code | escape }} "{{ throws.message | escape }}"
{% endfor %}
{% endif %}
     */
{% else %}
    /**{{ operation.docBlock ? ('\n' ~ operation.docBlock|join('\n')) : '' }}
     * @return {{ operation.returnType.docBlockType | raw }}
     */
{% endif %}
```

**Patterns to follow:** 现有 `interface.twig` 渲染结构

**Test scenarios:**
- Happy path: 带完整元数据的 operation 渲染正确 PHPDoc
- Edge case: 仅 summary 无 description
- Edge case: 有 description 无 summary
- Edge case: 无 @param 描述
- Edge case: 无 @throws
- Edge case: 降级模式（无结构化元数据）渲染不变

**Verification:**
- `tests/TarsGeneratorTest.php` 对比 `tests/fixtures/generated/openrpc-interface.php` 快照

---

- [ ] **Unit 5: 测试覆盖 — DocBlockTest.php + 集成测试**

**Goal:** 为所有新功能提供测试覆盖

**Requirements:** R1, R2, R3, R6, R7

**Dependencies:** Unit 1, Unit 2, Unit 3, Unit 4

**Files:**
- Create: `tests/domain/DocBlockTest.php`（新建）
- Create: `tests/fixtures/openrpc-metadata.tars`（新建 fixture）
- Create: `tests/fixtures/generated/openrpc-interface.php`（预期输出快照）
- Modify: `tests/TarsGeneratorTest.php`（新增 testOpenrpcMetadataGeneration）

**Approach:**
- `DocBlockTest.php`：独立测试 DocBlock 解析，覆盖 Unit 1 所有 test scenarios
- `openrpc-metadata.tars`：包含完整 docblock 的 tars fixture（summary、description、@throws、@param descriptions），fixture 内容示例：

```tars
module demo
{
    interface EmployeeService
    {
        /**
         * 精确查询单个员工。
         *
         * 根据员工姓名精确查询，返回员工对象。
         * @throws InvalidArgumentException $40001 "姓名不能为空"
         * @throws RuntimeException $40401 "User not found"
         */
        EmployeeDTO findByName(string name);
    };
};
```
- 集成测试：生成并对比预期输出，验证 R1（现有 fixture 不变）和 R2-R4

**Patterns to follow:** 现有 `tests/TarsGeneratorTest.php` 的 `assertStringEqualsFile` 模式

**Test scenarios:**
- Unit 1 所有场景（见 Unit 1）
- R1 验证：现有 `tests/fixtures/servant/interface.tars` 输出不变
- R2 验证：`openrpc-metadata.tars` 提取的元数据与预期一致
- R7 验证：`/* 普通注释 */` 不被识别为 docblock

**Verification:**
- `phpunit tests/domain/DocBlockTest.php` 全量通过
- `phpunit tests/TarsGeneratorTest.php` 全量通过
- 预期输出快照 `tests/fixtures/generated/openrpc-interface.php` 内容正确

## System-Wide Impact

- **Unchanged invariants:** 现有 `tests/fixtures/generated/*.php` 快照文件不受影响；tars 协议模板不变；GeneratorConfig.php 不变
- **API surface parity:** 仅影响 jsonrpc 协议生成的 PHP 接口；tars 协议生成路径不变
- **Integration coverage:** DocBlockTest.php 独立验证解析逻辑；集成测试验证端到端生成

## Risks & Dependencies

| Risk | Mitigation |
|------|------------|
| DocBlock 解析算法边界情况（空行位置、引号嵌套） | 充分的 edge case 测试覆盖 |
| `@throws` 正则表达式与输入格式不完全匹配 | 用户已确认格式为 `@throws Class $code "message"` |
| 模板降级逻辑与增强逻辑混合导致维护困难 | 两种模式完全互斥（有 metadata → 增强模式，否则降级），逻辑清晰 |

## Documentation / Operational Notes

- `docs/brainstorms/2026-04-23-tars-openrpc-metadata-extension-requirements.md` 为需求源文档，本计划跟随
- 不需要用户可见的文档变更（仅为工具内部增强）
