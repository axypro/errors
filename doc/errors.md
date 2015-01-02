# Exceptions provided by the library

These classes you can directly use or define your classes on the basis of their.

All intermediate errors (which have children) are interfaces.

All classes are inherited from `Error` and from `Runtime` or `Logic` (indicated in parentheses).

 * NotFound - an element of a container is not found
    * [FieldNotExists](classes/FieldNotExists.md) (logic) - a static container has not the specific field
    * [ItemNotFound](classes/ItemNotFound.md) (runtime) - a container not contains an item in this time
 * [InvalidConfig](classes/InvalidConfig.md) (logic) - a configuration has invalid format
 * RequiresOverride (logic) - a method requires override
 * Inited 
    * [AlreadyInited](classes/AlreadyInited.md) (logic) - attempt to initialize an already initialized object
    * [NotInited](classes/NotInited.md) (logic) - attempt to use not initialized object
 * Forbidden - an action is forbidden
    * ReadOnly
        * PropertyReadOnly (logic) - a property is readonly
        * ContainerReadOnly (logic) - a container is readonly
    * Pointless (logic) - an operation is pointless in this context
    * Disabled (logic) - a service is disabled
 * ActionNotAllowed - this action is not allowed for this object
 * InvalidValue - wrong format of a values
    * NotValid - value is not passed through the validators
    * TypingError - value has an wrong type

## Constructors and methods

Constructors of all these classes take as last arguments (optional)

 * `previous` (Exception) - the previous exception used for the exception chaining
 * `thrower` (object|string) - see [truncate backtrace](backtrace.md)

All other arguments also are optional.

Such arguments as container or service can be a string (the name of service) or an object (itself service).
