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
        self::$howTruncateStack = $value;
    }

    /**
     * @return mixed
     */
    public static function getHowTruncateTrace()
    {
        return self::$howTruncateStack;
    }

    /**
     * @var mixed
     */
    private static $howTruncateStack = true;
}