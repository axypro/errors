# `Opts`: the global options

The class `axy\errors\Opts` allows you to globally configure the follow options:
 
 * `howTruncateTrace`
 * `truncateNativeTrace`

[See for details](backtrace.md).

Setters:

 * `Opts::setHowTruncateTrace(mixed)`
 * `Opts::setTruncateNativeTrace(bool)`

Getters:

 * `Opts::getHowTruncateTrace():mixed`
 * `Opts::getTruncateNativeTrace():bool`
  
Global settings and static method it is usually bad.
But since it does not affect the functionality, but only on debug information then it is acceptable.

Overriding properties as `howTruncateTrace` and `truncateNativeTrace` affects only the classes themselves and their children.

Setting values using `Opts` has an effect on all classes (except where overriden).
