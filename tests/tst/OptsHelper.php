<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\tst;

use axy\errors\ItemNotFound;

class OptsHelper
{
    /**
     * @return string
     */
    public static function getFile()
    {
        return __FILE__;
    }

    /**
     * @throws \axy\errors\ItemNotFound
     */
    public static function error()
    {
        self::throwError();
    }

    private static function throwError()
    {
        throw new ItemNotFound;
    }
}
