# `AdapterNotDefined`

```php
class AdapterNotDefined extends Logic implements NotFound
```

```php
$mySQL = DB::createAdapter('MySQL'); // success
$pgSQL = DB::createAdapter('PgSQL'); // success
$wtfSQL = DB::createAdapter('WtfSQL'); // fail: Adapter "wtfSQL" is not defined for "DB"
```

### `__construct([$adapter, $service [, $previous, $thrower])`

 * `$adapter` - the name of adapter
 * `$service` - the service or its name
 
### Methods

 * `getAdapter():string`
 * `getService():object|string`
