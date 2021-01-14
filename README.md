```json
{
    "client": {
        "namespace": "{psr-4 namespace}\\integration",
        "tars_path": "client",
        "output": "src/integration",
        "servants": {
            "Hello": "TestApp.HelloServer.HelloObj"
        }
    },
    "servant": {
        "namespace": "{psr-4 namespace}\\servant",
        "tars_path": "servant",
        "output": "src/servant"
    }
}
```