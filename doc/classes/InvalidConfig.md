# InvalidConfig

```php
class InvalidConfig extends Logic implements Error
```

The configuration does not match the expected format.

```php
$config = [
    'url' => 'http://example.com',    
    'method' => 'get',    
    'timeout' => [1, 2, 3],
];

$crawler = new Crawler($config); // Crawler config has an invalid format: "timeout must be a number"
```

## __construct([$configName [, $errorMessage [, $code [, $previous, $thrower])

 * `$configName` - the config name
 * `$errorMessage` - the error message

## Methods

 * `getConfigName():string`
 * `getErrorMessage():string`
