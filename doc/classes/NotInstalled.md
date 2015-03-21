# `NotInstalled`

```php
class NotInstalled extends Logic implements DependencyError
```

Required for this action optional dependency is not installed on the system.
The dependency can be PHP-extension, composer package, some plugin and etc.

```php
throw new NotInstalled('mbstring', 'unicode strings'); // Required dependency "mbstring" for unicode string
```

### `__construct([string $dependency [, string $action [, $previous, $thrower])`

 * `$dependency` - the dependency name
 * `$action` - action that requires the dependency

### Methods

 * `getDependency():string`
 * `getAction():string`
