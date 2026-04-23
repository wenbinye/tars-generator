# tars-generator

A PHP code generator for [TARS](https://github.com/TarsPHP/Tars) RPC framework. Reads `.tars` interface definition files and generates type-safe PHP classes, servant interfaces, and OpenAPI annotations.

Supports both **TARS** and **JSON-RPC** protocols with optional OpenAPI 3.0 annotation generation.

---

## Features

- Generate PHP structs, enums, constants, and servant interfaces from `.tars` files
- JSON-RPC protocol support with full PHPDoc metadata (`@throws`, `@param` descriptions, summary, description)
- Struct field descriptions via `/** */` docblocks
- OpenAPI 3.0 attribute generation (`#[OA\Schema]`, `#[OA\Property]`)
- ANTLR4-based parser — fast, accurate, and extensible

---

## Requirements

- PHP >= 7.4
- [Composer](https://getcomposer.org/)

---

## Installation

```bash
composer require --dev wenbinye/tars-gen:^0.5
```

---

## Quick Start

Generate code from a single `.tars` file:

```bash
./vendor/bin/tars-gen \
    --namespace='App\JsonRpc' \
    --psr4-namespace='App' \
    --protocol=jsonrpc \
    --client \
    --strict-type \
    -o /tmp/src \
    path/to/your.tars
```

Or integrate into your project's `composer.json` scripts:

```json
{
  "scripts": {
    "gen": "./vendor/bin/tars-gen"
  }
}
```

Then run `composer gen` from your project root. See [Project-based generation](#project-based-generation) for configuration details.

---

## Project-based Generation

Place your `.tars` files under `tars/` and configure via `tars/config.json`:

```json
{
  "client": {
    "servants": { "Hello": "app.server.HelloObj" }
  },
  "jsonrpc": {
    "namespace": "App\\JsonRpc",
    "output": "src/",
    "servants": { "EmployeeService": "EmployeeServiceObj" }
  }
}
```

Directory layout:

```
your-project/
├── composer.json
└── tars/
    ├── config.json
    ├── servant/
    │   └── Hello.tars
    └── client/
        └── Hello.tars
```

Run from your project root:

```bash
composer gen
```

### Configuration Options

| Key | Description |
|-----|-------------|
| `namespace` | PHP namespace for generated classes. Defaults to the first `psr-4` in `composer.json`, with `integration` or `servant` appended |
| `psr4_namespace` | PSR-4 namespace prefix used to compute the output file path |
| `output` | Output directory. Defaults to the path of the first `psr-4` rule |
| `flat` | Whether to include the module name in the namespace. `true` for servant, `false` for client |
| `tars_path` | Path to `.tars` files. Defaults to `tars/client` or `tars/servant` |
| `servants` | Servant name map: `{moduleName}.{interfaceName}` or `{interfaceName}` → `objName` |
| `protocol` | `tars` or `jsonrpc`. Defaults to `tars` for servant, `jsonrpc` for jsonrpc config |
| `enable_openapi` | Generate OpenAPI 3.0 PHP attributes (`#[OA\Schema]`, `#[OA\Property]`) |

---

## CLI Reference

```
./vendor/bin/tars-gen [options] [--] [<tars-path>...]
```

### Options

| Flag | Description |
|------|-------------|
| `--namespace` | Full PHP namespace for generated classes |
| `--psr4-namespace` | PSR-4 prefix namespace (defaults to `--namespace`) |
| `--protocol` | Protocol: `tars` or `jsonrpc`. Default: `tars` |
| `--client` | Generate client (servant) code instead of integration code |
| `--strict-type` | Generate struct properties with strict PHP types |
| `--enable-openapi` | Generate OpenAPI 3.0 PHP attributes |
| `--use-php-enum` | Generate PHP 8.1 enum classes instead of TARS enums |
| `--servants` | Servant name mappings (repeatable: `Module=ObjName`) |
| `-o`, `--output-path` | Output directory |
| `-h`, `--help` | Show help message |
| `-V`, `--version` | Show version |

---

## Usage Examples

### Struct with Field Descriptions

In your `.tars` file, use `/** */` docblocks to annotate struct fields:

```tars
struct EmployeeDTO
{
    /** Unique employee identifier in the system */
    0 require long id;

    /** Employee's full name */
    1 require string name;

    /** Department name */
    2 require string department;

    /** Parent department ID (minors may link to guardian) */
    4 optional int parentId;
};
```

Generated PHP:

```php
final class EmployeeDTO
{
    /**
     * Unique employee identifier in the system
     * @var int
     */
    public int $id = 0;

    /**
     * Employee's full name
     * @var string
     */
    public string $name = '';
    // ...
}
```

### JSON-RPC Interface with Full Metadata

Use multi-line `/** */` docblocks to document operations:

```tars
interface EmployeeService
{
    /**
     * Paginated employee list query.
     *
     * Returns employees filtered by department with pagination metadata.
     *
     * @throws InvalidArgumentException $40002 "page must be greater than 0"
     * @throws InvalidArgumentException $40003 "pageSize out of range"
     *
     * @param int page     Page number, starting from 1
     * @param int pageSize Number of records per page (1-100)
     * @param string department Department name filter (optional)
     */
    PageResult list(int page, int pageSize, string department);
}
```

Generated PHP interface:

```php
interface EmployeeServiceServant
{
    /**
     * Paginated employee list query.
     *
     * Returns employees filtered by department with pagination metadata.
     *
     * @param int    $page       Page number, starting from 1
     * @param int    $pageSize   Number of records per page (1-100)
     * @param string $department Department name filter (optional)
     * @return PageResult
     * @throws \InvalidArgumentException $40002 "page must be greater than 0"
     * @throws \InvalidArgumentException $40003 "pageSize out of range"
     */
    public function list(int $page, int $pageSize, string $department): PageResult;
}
```

---

## Directory Structure

```
src/
 |- integration/     # Server-side generated code (non-client)
 `- servant/        # Client-side generated code

tars/
 |- config.json     # Generator configuration
 |- client/         # .tars files for client stubs
 `- servant/        # .tars files for servant interfaces
     `- includes/  # Shared .tars include files
```

---

## Regenerating the ANTLR4 Parser

If you modify `src/parse/Tars.g4`, regenerate the parser:

```bash
# Install ANTLR4 (Java required)
java -version   # >= Java 8

# Add alias (optional)
alias antlr4="java -Xmx500M -cp /path/to/antlr-4.8-complete.jar org.antlr.v4.Tool"

# Generate PHP parser from grammar
antlr4 -Dlanguage=PHP -package tars\\parse src/parse/Tars.g4
```

---

## License

MIT
