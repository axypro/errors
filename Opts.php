<?php
/**
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\errors;

/**
 * Global options of the library
 */
class Opts
{
    /**
     * @param mixed $value
     */
    public static function setHowTruncateTrace($value)
    {
        self::$howTruncateTrace = $value;
    }

    /**
     * @return mixed
     */
    public static function getHowTruncateTrace()
    {
        return self::$howTruncateTrace;
    }

    /**
     * @param mixed $value
     */
    public static function setTruncateNativeTrace($value)
    {
        self::$truncateNativeTrace = $value;
    }

    /**
     * @return mixed
     */
    public static function getTruncateNativeTrace()
    {
        return self::$truncateNativeTrace;
    }

    /**
     * @var mixed
     */
    private static $howTruncateTrace = true;

    /**
     * @var bool
     */
    private static $truncateNativeTrace = false;
}
