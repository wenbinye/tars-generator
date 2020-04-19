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

参考 `examples/generate.sh` 。

## Integration to composer

Add Configuration in composer.json:

```json
{
  "scripts": {
     "gen": "./vendor/bin/tars-gen"
  },
  "extra": {
    "tars": {
      "generator": {
        "client": [{
          "flat": true,
          "namespace": "{psr-4 namespace}\\client",
          "tars_path": "tars/client",
          "output": "src",
          "servants": {
            "Hello": "TestApp.HelloServer.HelloObj"
          }
        }],
        "servant": [{
          "flat": true,
          "namespace": "{psr-4 namespace}\\servant",
          "tars_path": "tars/servant",
          "output": "src",
          "servants": {
            "Hello": "HelloObj"
          }
        }]
      }
    }
  }
}
```
