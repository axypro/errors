# `ActionNotAllowed`

```php
class ActionNotAllowed extends Logic implements Error
```

The action cannot perform for an object in a the current state.
Although in general it is allowed.

```php
$user = new User();
$user->name = 'John';
$user->email = 'john@example.com';

// $user->save();

$user->delete(); // Action "delete" is not allowed for user (he has not yet created)
```

Access by index is pointless in this context.

### `__construct($action, $object [, $reason [, $previous, $thrower])`

 * `$action` - the action name
 * `$object` - the target object or its name
 * `$reason` - the description of the reason

### Methods

 * `getAction():string`
 * `getObject():string|object`
 * `getReason():string`
