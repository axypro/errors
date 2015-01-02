# `RequiresOverride`

```php
class RequiresOverride extends Logic implements Error
```

The soft version of an abstract method.
An action can only be realized in the child.
But this action is not so important to make abstract class and make everyone implement it.

```php
class MyClass
{
    public function notNecessaryFeature()
    {
        throw new RequiresOverride();
    }    
}
```

The functional object is trimmed, but it remains a working.

### `__contruct([$method [, $previous, $thrower])`

 * `$method` - the method name or TRUE (by default) - use the last method from the stack trace.

### Methods

 * `getMethod():string`
