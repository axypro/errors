### 2.0.0 (02.02.2019)

* Use PHP 7.1 (type hinting, strict types and etc)
* Move classes to `src` dir
* Remove native truncate stack feature (don't supported for PHP 7)
* Use phpunit 7.5
* Install dev-tools (phpunit, phpcs, phpmd) locally


## Version 1.x, Support PHP 5.4, branch `php5`

### 1.0.5 (02.02.2019)

* Travis & Coveralls
* Fix tests for PHP7 and native trace truncate
* Refactoring README

### 1.0.4 (13.11.2015)

* InvalidFormat
* Code style

### 1.0.3 (10.11.2015)

* Exclude tests, docs and etc from GitHub zip and Composer package dist
* A little refactoring and code style

### 1.0.2 (28.03.2015)

* DependencyError
* NotInstalled
* AdapterNotDefined

### 1.0.1 (09.02.2015)

* Fixed the Init-errors hierarchy
* @links to the documentation
* Refactoring composer.json
* Inspect code

### 1.0.0 (02.01.2015)

* Optional truncate native trace
* Opts: Global options of the library
* InvalidConfig::getErrmsg() is deprecated. Use getErrorMessage().
* NotValid::getErrmsg() is deprecated. Use getErrorMessage().
* Documentation in English

### 0.0.5 (18.02.2014)

* ActionNotAllowed
* InvalidValue (NotValid, TypingError)
* Composer: removed composer.lock

### 0.0.4 (24.01.2014)

* Composer: PSR-4
* fix: first argument for Disabled is optional.
* Some refs and docs

### 0.0.3 (28.12.2013)

* Disabled exception

### 0.0.2 (25.12.2013)

* The $thrower argument
* interface NotFound
* interface Init
* class AlreadyInited
* class NotInited

### 0.0.1 (22.12.2013)

* Message template
* Truncate backtrace
* Error
* Logic
* Runtime
* NotFound (FieldNotExists, ItemNotFound)
* InvalidConfig
* RequiresOverride
* Inited (AlreadyInited, NotInited)
* Forbidden (ReadOnly, PropertyReadOnly, ContainerReadOnly, Pointless)
