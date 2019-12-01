
配置项
tars-dir
output-dir
namespace

1. const

```
module App {
const i = 1;
const s = "sss";
}
```

```php
<?php
namespace ns;

final class AppConst {
const i = 1;
const s = "sss";
}
```

2. enum

```
module App {
  enum TE {
    E1,
    E3,
    E2
  }
}
```

生成：
```
<?php

namespace ns;
final class TE extends Enum {
const E1 = 0;
const E3 = 1;
const E2 = 2;
}
```

3. struct

```
module App
{
  struct SimpleStruct {
    0 require long id=0;
    1 require unsigned int count=0;
    2 require short page=0;
  };
}
```

```php
<?php
namespace ns;

class SimpleStruct {
/**
 * @TarsStructProperty(order=0, required=true, type="long")
 * @var int
 */
 public $id;

/**
 * @TarsStructProperty(order=1, required=true, type="unsigned int")
 * @var int
 */
 public $count;

/**
 * @TarsStructProperty(order=2, required=true, type="short")
 * @var int
 */
 public $order;
}
```

4. interface

```
module App {
	interface Hello
	{
	    string hello(int no, string name);
	};
}
```

```php
namespace ns;
interface HelloServant {
/**
 * @TarsParam(name="no", type="int")
 * @TarsParam(name="name", type="string")
 * @TarsReturn(type="string")
 */
public hello(int $no, string $name): string;
}
```

5. key
