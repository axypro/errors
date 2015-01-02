# `PropertyReadOnly`

```php
class PropertyReadOnly extends Logic implements ReadOnly
```

Attempting to write a value in the read-only property.

Unlike [ContainerReadOnly](ContainerReadOnly.md) other properties may be editable.

```php
$vars->x = 1;
$vars->y = 2;
$vars->z = 3;
echo $vars->count; // 3

$vars->count = 4; // Property vars::count is read-only
```

Even this property can be editable at other time.

```php
$crawler->url = 'http://example.com';
$crawler->run();

$crawler->url = 'http://newsite.loc'; // too late
```

### `__construct([$container, $key [, $previous, $thrower])`

 * `$container` - the container or its name
 * `$key` - the property key

### Methods

 * `getContainer():string|object`
 * `getKey():string`
