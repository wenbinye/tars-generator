# TARS 代码生成器

## Requirement

- PHP >= 7.4

## Installation

```bash
composer require --dev wenbinye/tars-gen:^0.5
```

## Usage

```bash
$ ./vendor/bin/tars-gen
```

## Integration to composer

Add Configuration in composer.json:

```json
{
  "scripts": {
     "gen": "./vendor/bin/tars-gen"
  }
}
```

在项目中运行 `composer gen` 生成代码。

## 目录结构

```
 |- src/
 | |- integration/
 | `- servant/
 `- tars/
  |- config.json
  |- client/
  `- servant/
   `- includes/
```

生成器配置文件为 tars/config.json 文件。配置文件示例：
```json
{
    "client": {
        "servants": {
            "Hello": "app.server.HelloObj"
        }
    }
}
```

配置中 servant, client 分别对应生成服务提供方接口代码和客户端代码。

配置项包括：

- `namespace` 代码生成的名字空间，默认会读取项目 `composer.json` 文件中第一个 psr-4 规则，client 添加 'integration'，servant 添加 'servant'
- `output`代码生成目录，默认会使用 composer.json 第一个 psr-4 规则根据 psr-4 规则计算输出目录
- `flat` 是否将文件中的 module 加入到命名空间中，默认对于 client 为 false，对于 servant 为 true
- `tars_path` tars 文件目录，默认为 client 为 tars/client, servant 为 tars/servant
- `servants` tars 服务名列表，通过 `{moduleName}.{interfaceName}` 或 `{interfaceName}` 查询
- `enable_openapi` 是否生成 OpenAPI 注解
- `protocol` 支持生成 tars 和 jsonrpc 两种代码。默认生成 tars 代码

## jsonrpc 支持

servant 目录下生成代码方式和 protocol 保持一致。client 目录生成 tars 客户端代码，jsonrpc 目录生成 jsonrpc 客户端代码。

## ANTLR4 代码生成

在 .bashrc 中添加：

```
alias antlr4="java -Xmx500M -cp /path/to/antlr-4.8-complete.jar org.antlr.v4.Tool"
```

生成代码：

```
antlr4 -Dlanguage=PHP -package tars\\parse src/parse/Tars.g4
```
