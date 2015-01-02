# `NotValid`

```php
class NotValid extends Logic implements InvalidValue
```

The value does not fit the requirements.

```php
$value = 'This is value';

$validators = [
    'IsString',
    'NotEmpty',
    ['MaxLength', 5],
];

validation($value, $validators); // Value of $value is not valid: too long'
```

### `__construct([$varName, $errorMessage [, $previous, $thrower])`

 * `$varName` - the value name (the name of the variable or the container) 
 * `$errorMessage` - the description of the error

### Methods

 * `getVarName():string`
 * `getErrorMessage():string`
