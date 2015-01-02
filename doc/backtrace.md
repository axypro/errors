# Truncate backtrace

For exceptions that inherit from `axy\errors\*` truncated a backtrace.

See [axy/backtrace documentation](https://github.com/axypro/backtrace/blob/master/doc/truncate.md) for details.
In short, it is necessary to output error indicates an entry point to the library, but not to a point inside.

## By default

Default means the following scheme.
All classes of the library exceptions contained in the namespace to one level below of the library.

For example:
 
 * Library `my/lib`
 * Root namespace `my\lib`
 * Namespace for exception classes: `my\lib\errors`

```php
namespace other\lib;

$obj = new my\lib\TestClass();

$obj->method($invalidArg); // throws my\lib\errors\TestError
```

When `TestError` is thrown determined its namespace (`my\lib\error`) and a namespace of its library (`my\lib`, one level higher).
The stack truncated before entering in the `my\lib`.

Output of the exception points to the line where `$obj->method($invalidArg)`.

## Properties and methods

Change the properties `$file` and `$line`.
And, accordingly, the results of `getFile()` and `getLine()`.
They point to an entry point to the library.

Previous values are available by `getOriginFile()` and `getOriginLine()`.

`getTruncatedTrace()` returns an instance of [axy\backtrace\ExceptionTrace](https://github.com/axypro/backtrace/blob/master/doc/ExceptionTrace.md).
It contains the truncated stack.

The stack which returns by `getTrace()` and which output in console is not modified.

If you still really need to change the result of `getTrace()`, it is possible with the help of a dirty hack.
See below.

## Settings

### `howTruncateTrace`

```php
class MyClass extends axy\errors\Runtime
{
    protected $howTruncateTrace = false;
}
```

The property `$howTruncateTrace` explains how truncate the trace.

 * `TRUE` - truncate by the parent namespace (by default).
 * `FALSE` - do not truncate.
 * `string` - the namespace for cut.
 * `array` - the parameters for [truncate](https://github.com/axypro/backtrace/blob/master/doc/truncate.md)

### `truncateNativeTrace`

To the native trace (which returns by `getTrace()`) can not be accessed.
But if you really want it, it is possible.

```php
class MyClass extends axy\errors\Runtime
{
    protected $truncateNativeTrace = false;
}
```

For `MyClass` and it children native stack will be truncated.

### `Opts`

Properties `howTruncateTrace` and `truncateNativeTrace` have effect only for classes (and they children) where they are redefined.
For global settings see [Opts](Opts.md).

## Argument `$thrower`

All constructors of axy-exceptions takes as the last optional argument `$thrower`.
It indicates where an exception is thrown.

For example, we do not want to define own exception and use axy-exception:

```php
namespace my\ns;

class MyClass
{
    public function myMethod()
    {
        throw new \axy\errors\ContainerReadOnly('Container');
    }
}
```

In this case stack will be truncated to entry to `axy\errors` (not `my\ns`).

```php
namespace my\ns;

class MyClass
{
    public function myMethod()
    {
        throw new \axy\errors\ContainerReadOnly('Container', null, $this);
    }
}
```

In this case `$thrower` helps determine the class from which exception was thrown.

Possible values:

 * string - the root namespace of the library
 * object - truncate to the namespace of this object
