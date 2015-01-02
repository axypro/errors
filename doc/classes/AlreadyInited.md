# `AlreadyInited`

```php
class AlreadyInited extends Logic implements Inited
```

For classes that require manual initialization.

```php
$instance = new TClass();
$instance->init($config);

// ...

$instance->init($config2); // Object has already been initialized
```

### `__construct([$object [, $previous, $thrower])`

 * `$object` - the object or its name

### Methods

 * `getObject():object|string`
