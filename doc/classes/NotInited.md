# `NotInited`

```php
class NotInited extends Logic implements Inited
```

For classes that require manual initialization.

```php
$instance = new TClass();
// $instance->init($config);
$instance->call();
```

### `__construct([$object [, $previous, $thrower])`

 * `$object` - the object or its name

### Methods

 * `getObject():object|string`
