# `ContainerReadOnly`

```php
class ContainerReadOnly extends Logic implements ReadOnly
```

Attempting to write a value in the read-only property.

Unlike [PropertyReadOnly](PropertyReadOnly.md) all the properties of the container always read-only.

### `__construct([$container [, $previous, $thrower])`

 * `$container` - the container or its name

### Methods

 * `getContainer():string|object`
