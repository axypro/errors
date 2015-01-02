# `FieldNotExists`

```phph
class FieldNotExists extends Logic implements NotFound
```

The container contains fixed set of fields.
Attempt to access a non-existent field, usually a consequence of misspelling (logic error).

```php
/**
 * @property string $name
 * @property string $email
 */
class User
{
    // ...
}

$user = new User();
$user->emial = 'my@example.com'; // Field "emial" is not exist in "User"
```

## `__construct([$key, $container [, $previous, $thrower])`

 * `$key` - the name of field
 * `$container` - the container or its name
 
## Methods

 * `getKey():string`
 * `getContainer():object|string`
