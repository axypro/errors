# Organization

## Hierarchy

It is assumed

 * All exceptions are derived from the same root.
 * All exceptions are divided into Logic and Runtime.

Thus it is possible to catch
 
 * All exceptions that were thrown specific library
 * All Runtime (for example) exceptions, regardless of where they thrown

In `axy\errors` defined following basic exception:

 * `Error` (interface)
    * `Logic` (class extends from `Error` and global `LogicException`)
    * `Runtime` (class extends from `Error` and global `RuntimeException`)

In additional, in the library defined some number more specific basic classes (`ItemNotFound` for example).
List is given in [the relevant part](errors.md).

## Example of use

We propose the following scheme.
For example, there is a library in `my\ns` namespace.
All exception classes of this library are located in `my\ns\errors`.

Define the interface `my\ns\errors\Error` (implements `axy\errors\Error`).
This is basic exception of the library.

All concrete classes are inherit from `Error` and from `axy\error\Logic` or `axy\error\Runtime` (or more specific class).

```php
namespace my\ns\errors;

class InvalidMyConfig extends \axy\errors\InvalidConfig implements Error
{
}
```

In this way `InvalidMyConfig` is successor of follow classes

 * `Exception`
 * `LogicException` - catch all Logic-errors.
 * `axy\errors\Error`
 * `axy\errors\Logic`
 * `axy\error\InvalidConfig` - catch all invalid configs.
 * `my\ns\errors\Error` - catch all `my\ns` library errors.

## Constructors

The constructor of basic `Logic` and `Runtime` has the following form

```php
__constructor([mixed $message [, int $code [, Exception $previous [, mixed $thrower])
```

It has the following differences from the standard constructor

 * `$message` may be not only a string. It may be an array for [message template](message.md).
 * `$thrower` is pointer of who threw an exception. See [trace truncate](backtrace.md).

The constructors of the other classes can take more specific arguments instead `$message` and `$code`.
But all `axy\errors` classes take `$previous` and `$thrower` as latest arguments.

For example: `FieldNotExists::__constructor([$key [, $container [, $previous [, $thrower])`.
Here `$key` is the key which was not found in `$container`.
