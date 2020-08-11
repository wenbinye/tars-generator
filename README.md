# TARS 代码生成器

## Installation

```bash
mvn package
```

## Usage

```bash
$ java -jar target/tars-generator-1.0-SNAPSHOT-jar-with-dependencies.jar -h
Usage: gen [-fhV] [-c=<tarsCharset>] [-C=<charset>] [-n=<namespace>]
           -o=<outputPath> -t=<tarsPath> [-T=<templatePath>]
           [-s=<String=String>]...
Generate PHP Code from Tars file.
  -c, --charset=<tarsCharset>
                         tars file charset
  -C, --output-charset=<charset>
                         output file charset
  -f, --flat-namespace   if true, add tars module namespace to generate class
  -h, --help             Show this help message and exit.
  -n, --namespace=<namespace>
                         php class namespace
  -o, --output-path=<outputPath>
                         output path
  -s, --servant=<String=String>
                         interface name to servant name
  -t, --tars-path=<tarsPath>
                         tars file path
  -T, --template=<templatePath>
                         tempa
  -V, --version          Print version information and exit.
```

See `examples/generate.sh` 。

## Integration to composer

Add Configuration in composer.json:

```json
{
  "require-dev": {
     "wenbinye/tars-gen": "^0.2"
  },
  "scripts": {
     "gen": "./vendor/bin/tars-gen"
  }
}
```

生成器配置文件为 tars/config.json 文件。配置文件示例：
```json
{
  "client": [
    {
      "flat": true,
      "namespace": "{psr-4 namespace}\\integration",
      "tars_path": "client",
      "output": "src/integration",
      "servants": {
        "Hello": "TestApp.HelloServer.HelloObj"
      }
    }
  ],
  "servant": [
    {
      "flat": true,
      "namespace": "{psr-4 namespace}\\servant",
      "tars_path": "servant",
      "output": "src/servant"
    }
  ]
}
```

默认情况下，tars/servant 目录下的文件将作为 servant 类型生成接口文件，
client 类型文件必须配置后才能生成。
`flat` 配置项为 true，也就是不将 tars 定义文件中的 module 加入到命名空间中。
`namespace` 会读取 `composer.json` 文件中第一个 psr-4 命名空间，
如果是 client 类型，命名空间为 intergration，如果是 servant 类型，命名空间为 servant。
输出目录会自动根据 psr-4 自动加载规则生成。

对于 client 类型，必须配置 tars_path 和 servants。

> tars 文件目录结构通常包含 servant 和 client 两个目录。如果确定本项目不会提供
> tars rpc 服务，可以将所有 client 的定义文件都放到 tars 目录下。
