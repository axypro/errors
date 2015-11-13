# `InvalidFormat`

```php
class InvalidFormat extends Logic
```

An value (usually a string) does not match of a specific format.

* IPv4 "127.0.0.256" has invalid format.
* Twig tag {% endfor item in items %} has invalid format.

```php
throw new InvalidFormat('127.0.0.256', 'IPv4');
```

### `__construct([$value, $type [, $previous, $thrower])`

 * `$value` - the invalid string
 * `$type` - the format type

### Methods

 * `getValue():string`
 * `getType():string`
