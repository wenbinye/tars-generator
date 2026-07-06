# TARS 文件 OpenRPC 元数据扩展需求

**日期:** 2026-04-23
**状态:** 已确认

## 背景与目标

基于 `openrpc-service-example.php` 规范，在现有 `.tars` 文件格式中扩展对 OpenRPC 方法元数据的支持，使得从 TARS 文件生成的 PHP 服务类包含完整的 description、errors、param descriptions 等元数据，符合 JSON-RPC 2.0 + OpenRPC 服务发现标准。

**核心原则：** 完全向后兼容。现有 `.tars` 文件无需任何改动，新元数据是可选的。

---

## 决策记录

### Q1: 目标场景
- **选择:** 生成 OpenRPC PHP 服务类骨架
- **解释:** 基于 tars 文件自动生成符合 openrpc-service-example.php 规范的 PHP 服务类（带 PHPDoc 元数据），用于 JSON-RPC 2.0 服务发现

### Q2: 格式关系
- **选择:** 扩展现有 .tars 格式（向后兼容）
- **解释:** 在现有 .tars 语法的 interface operation 行前，通过 docblock 注释语法添加 description、errors、param description 等元数据，兼容现有格式

### Q3: 元数据载体
- **选择:** 直接写入 PHPDoc 注释
- **解释:** 解析 TARS 扩展语法后，将 description、errors、param description 直接写入生成的 PHP 接口/类方法的 PHPDoc 注释中（与 openrpc-service-example.php 一致）

### Q4: 参数描述语法
- **选择:** 仅从 docblock @param 注解提取
- **解释:** 在 operation 的 docblock 中写 `@param Type $name 描述`，与方法文档放在一起，语法统一

---

## TARS 文件扩展语法

### 语法说明

在 `.tars` 文件的 interface 中，operation 声明行前可以写 PHPDoc 风格的 docblock。

### DocBlock 解析规则

docblock 内容通过以下规则解析：

| DocBlock 内容 | 含义 | 生成的 PHPDoc |
|---|---|---|
| 第一行非标签内容（到第一个空行） | Summary（方法一句话描述） | PHPDoc 首行 |
| 空行后的段落 | Description（方法详细描述） | PHPDoc 后续段落 |
| `@throws ExceptionClass $code "message"` | 声明方法可能抛出的错误 | `@throws \ExceptionClass $40001 "姓名不能为空"` |
| `@param Type $name description` | 参数描述 | `@param Type $name description` |
| 无 docblock | 没有元数据 | 仅生成方法签名 |

### 完整示例

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

        /**
         * 分页查询员工列表。
         * @throws InvalidArgumentException $40002 "page 参数必须大于 0"
         * @param int page 页码，从 1 开始
         * @param int pageSize 每页记录数，默认 20
         * @param string department 部门名称筛选，可为空
         */
        PageResult list(int page, int pageSize = 20, string department);

        // 无 docblock 的操作——生成无元数据的方法签名
        void delete(long id);
    };
};
```

### 语义约束

1. **Summary 推断:** 第一行非标签内容（到第一个空行截止）作为 summary
2. **Description 推断:** 空行后的所有内容作为 description
3. **参数 required 判断:** PHP 方法签名中有默认值 → required: false；无默认值 → required: true
4. **@throws 格式:** 必须为 `@throws ExceptionClass $code "message"`，若类名无前导 `\` 则自动补全为完全限定名 `@throws \ExceptionClass $code "message"`；code 部分透传不加工
5. **@param 格式:** `@param Type $paramName description`，description 透传到生成的 PHPDoc `@param`

---

## 生成的 PHP 代码示例

### Service 类（servant 模式）

```php
namespace App\JsonRpc;

#[JsonRpcService(service: "demo.EmployeeService")]
class EmployeeService
{
    /**
     * 精确查询单个员工。
     *
     * 根据员工姓名精确查询，返回员工对象。
     *
     * @param string $name 员工姓名
     * @return EmployeeDTO|null 员工对象
     * @throws \InvalidArgumentException $40001 "姓名不能为空"
     * @throws \RuntimeException $40401 "User not found"
     */
    public function findByName(string $name): ?EmployeeDTO;
}
```

### Client 接口（client 模式）

```php
namespace App\JsonRpc\Client;

interface EmployeeServiceClient
{
    /**
     * 精确查询单个员工。
     *
     * @param string $name 员工姓名
     * @return EmployeeDTO|null 员工对象
     * @throws \InvalidArgumentException $40001 "姓名不能为空"
     * @throws \RuntimeException $40401 "User not found"
     */
    public function findByName(string $name): ?EmployeeDTO;
}
```

---

## 需要修改的文件

| 文件 | 改动 |
|---|---|
| `src/domain/DocBlock.php` | 扩展解析：支持 `@throws` 注解；新增 `getSummary()`、`getDescription()`、`getThrows()` 方法 |
| `src/domain/TarsOperation.php` | 新增 `$summary`、`$description`、`$throws` 属性（均为 `?string` / `?array`）；新增 `$paramDescriptions` map（`array<string, string>`） |
| `src/domain/TarsParameter.php` | 新增 `$description` 属性（`?string`） |
| `src/TarsGeneratorListener.php` | 增强 `enterOperation`：(1) 创建 TarsOperation 和 TarsParameter 对象；(2) 从 hidden token 提取原始 docblock 文本，**检查文本以 `/**` 开头才作为 docblock 处理**（跳过普通 `/* */` 块注释）；(3) 调用 `DocBlock::create()` 生成规范化 DocBlock；(4) **直接从原始文本用正则解析 `@param $name description`，填充 `TarsParameter.description`**（绕过 DocBlock::create() 对 `@param` 行的破坏）；(5) 解析 `@throws` 填充 `TarsOperation.$throws`；解析 summary/description 填充对应属性 |
| `resources/views/jsonrpc/interface.twig` | 改为调用 `operation.docBlock.getSummary()`、`operation.docBlock.getDescription()`、`operation.docBlock.throws`（数组）、`operation.paramDescriptions['name']` 等结构化方法渲染 PHPDoc，不再遍历原始行 |
| `src/GeneratorConfig.php` | 不需改动（无需 openrpc_metadata 配置开关，docblock 是否存在即可决定是否激活元数据） |
| `tests/domain/DocBlockTest.php` | 新建 PHPUnit 测试文件，覆盖：summary 提取、description 提取、`@throws` 解析、`@param` 描述提取、无 docblock 回退、畸形 `@throws` 处理、`/** */` vs `/* */` 区分 |

---

## 非目标（暂不实现）

1. 不生成独立的 OpenRPC JSON 文档文件（由运行时库根据 PHPDoc 生成）
2. 不支持 `.orpc` 独立文件格式（扩展现有 .tars 格式）
3. 不支持参数的行内 trailing comment 语法（如 `int no /**< 员工号 */`）
4. 不支持 OpenAPI 注解的增强（仅限 OpenRPC/PHPDoc）

---

## 验收标准

1. 现有无 docblock 的 `.tars` 文件生成的 PHP 代码**完全不变**
2. 新增 docblock 的 `.tars` 文件能正确提取 summary、description、@throws、@param 描述
3. 生成的 PHPDoc 格式与 `openrpc-service-example.php` 中的格式一致
4. `@throws` 注解格式为 `@throws \ExceptionClass $code "message"`（类名自动补全前导 `\`），code 部分透传不加工
5. 参数 required 判断通过生成的 PHP 方法签名推断：有默认值的参数（`$page = 20`）→ `required: false`；无默认值 → `required: true`（与 openrpc-service-example.php 规范一致；TARS 格式本身不需支持默认值语法）
6. 单元测试覆盖 DocBlock 解析增强逻辑
7. `/* 普通注释 */` 不被当作 docblock 处理，只有 `/** */` 才被识别为 docblock
