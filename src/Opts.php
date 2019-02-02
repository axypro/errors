<?php
/**
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

declare(strict_types=1);

namespace axy\errors;

/**
 * Global options of the library
 *
 * @link https://github.com/axypro/errors/blob/master/doc/Opts.md documentation
 */
class Opts
{
    /**
     * @param mixed $value
     */
    public static function setHowTruncateTrace($value): void
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
    public static function setTruncateNativeTrace($value): void
    {
        self::$truncateNativeTrace = $value;
    }

    /**
     * @return mixed
     */
    public static function getTruncateNativeTrace(): bool
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
