# TARS 代码生成器

## Installation

```bash
composer require --dev wenbinye/tars-gen:^0.3
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

生成器配置文件为 tars/config.json 文件。配置文件示例：
```json
{
    "client": {
        "servants": {
            "Hello": "TestApp.HelloServer.HelloObj"
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

> tars 文件目录结构通常包含 servant 和 client 两个目录。如果确定本项目不会提供
> tars rpc 服务，可以将所有 client 的定义文件都放到 tars 目录下，然后设置 client.tars_path 为 "tars"。

