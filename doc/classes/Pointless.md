# `Pointless`

```php
class Pointless extends Logic implements Forbidden
```

An operation is pointless in this context

For example, a container accumulates a data.
For simplicity implemented `ArrayAccess`.

```php
$container[] = 'data 1';
$container[] = 'data 2';
```

Access by index is pointless in this context.

```php
unset($container['key']); // This action is pointless in the current context
```

### `__construct([$previous, $thrower])`

 * `$object` - the object or its name

### Methods

No own methods.
