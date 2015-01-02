# `Disabled`

```php
class Disabled extends Logic implements Forbidden
```

For example, the Service Locator provides access to a set of services.
Some of these services may be disabled in this configuration or current environment. 

```php
$request->$console->getArgs(); // It is HTTP-request
```

### `__construct([$service [, $previous, $thrower])`

 * `$service` - the service or its name

### Methods

 * `getService():string|object`
