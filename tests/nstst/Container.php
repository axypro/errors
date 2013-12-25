<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\nstst;

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
     * @param strin $key
     * @throws \axy\errors\ItemNotFound
     */
    public function getUndefinedItem($key)
    {
        throw new \axy\errors\ItemNotFound($key, $this);
    }

    /**
     * @param strin $key
     * @throws \axy\errors\FieldNotExist
     */
    public function getUnknownField($key)
    {
        throw new \axy\errors\FieldNotExist($key, $this);
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
