<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\nstst;

use axy\errors\FieldNotExist;
use axy\errors\ItemNotFound;

class Container
{
    /**
     * @param int $num
     */
    public function __construct($num)
    {
        $this->num = $num;
    }

    /**
     * @param string $key
     * @throws ItemNotFound
     */
    public function getUndefinedItem($key)
    {
        throw new ItemNotFound($key, $this);
    }

    /**
     * @param string $key
     * @throws FieldNotExist
     */
    public function getUnknownField($key)
    {
        throw new FieldNotExist($key, $this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return 'Container#'.$this->num;
    }

    /**
     * @param mixed $ns
     * @throws \axy\errors\tests\nstst\errors\InvalidConfig
     */
    public static function thrower($ns)
    {
        $t = new thrower\Thrower();
        self::$file = __FILE__;
        self::$line = __LINE__ + 1;
        $t->run($ns);
    }

    public static $file;

    public static $line;

    /**
     * @var int
     */
    private $num;
}
