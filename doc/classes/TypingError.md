# `TypingError`

```php
class TypingError extends Logic implements InvalidValue
```

The value belongs to an unsupported type.

```php
$fileNames = true;

scanFiles($fileNames); // fileNames must be array, string or null
```

### `__construct([$varName, $expected [, $previous, $thrower])`

 * `$varName` - the value name (the name of the variable or the container) 
 * `$expected` - the list of the expected types (an array or a string for single)

### Methods

 * `getVarName():string`
 * `getExpected():string`
