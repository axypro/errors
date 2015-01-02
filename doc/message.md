# The error message

The exception classes that inherit from `axy\errors\*` are able to define the default message.
Not to write it every time.

```php
class MyError extends \axy\errors\Logic implements Error
{
    protected $defaultMessage = 'This is default message';
}

throw new MyError(); // This is default message
throw new MyError('message'); // message
```

## The message template

In `$defaultMessage` can write a message template in which the variables are inserted using `{{ var }}`.
Then, instead of a string you can pass an array of variables.
 
 ```php
 class QueryError extends \axy\errors\Logic
 {
     protected $defaultMessage = 'Error #{{ code }} in query "{{ query }}": {{ error }}';
 
     public function __construct($query, $error, $code)
     {
         $this->query = $query;
         $this->error = $error;
         $message = [
             'query' => $query,
             'error' => $error,
         ];
         parent::__construct($message, $code);
     }
 
     final public function getQuery()
     {
         return $this->query;
     }
 
     final public function getError()
     {
         return $this->error;
     }
 
     private $query, $error;
 }
 ```
 
 Use:
 
 ```php
 class MyDB
 {
     public function query($sql) 
     {
         if (!$this->db->query($sql)) {
             throw new QueryError($sql, $this->db->error, $this->db->errno);
         }
     }
 }
 ```
 
 Do a query to a nonexistent table:
 
 ```php
 $mydb->query('SELECT * FROM `unknown`');
 ```
 
 Output:
 
 ```php
 QueryError: Error #1146 in query "SELECT * FROM `unknown`": Table 'test.unknown' doesn't exist
 ```
 
If one of the variables is an object then it can be reduced to a string.
If it is impossible then reduced to empty string.

If `{{ code }}` is specified in the template and it is not found in an array used `$code` of the exception. 
