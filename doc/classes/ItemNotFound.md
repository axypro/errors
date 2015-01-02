# `ItemNotFound`

```php
class ItemNotFound extends Runtime implements NotFound
```

The container contains changing set of elements.
The element was not found but could be (runtime error).

```php
$id = $request->post->id; // access to $_POST['id'], ?id was not specified
```

## `__construct([$key, $container [, $previous, $thrower])`

 * `$key` - the name of field
 * `$container` - the container or its name
 
## Methods

 * `getKey():string`
 * `getContainer():object|string`
