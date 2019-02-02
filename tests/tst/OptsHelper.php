<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests\tst;

use axy\errors\ItemNotFound;

class OptsHelper
{
    /**
     * @return string
     */
    public static function getFile(): string
    {
        return __FILE__;
    }

    /**
     * @throws \axy\errors\ItemNotFound
     */
    public static function error(): void
    {
        self::throwError();
    }

    private static function throwError(): void
    {
        throw new ItemNotFound;
    }
}
