<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\nstst;

use axy\errors\ItemNotFound;

class OptHowTruncate
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
        throw new ItemNotFound;
    }
}
