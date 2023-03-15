<?php

declare(strict_types=1);

namespace axy\errors\tests\tst;

use axy\errors\FieldNotExist;
use axy\errors\ItemNotFound;
use axy\errors\tests\tst\errors\InvalidConfig;

class Container
{
    /**
     * @param int $num
     */
    public function __construct(int $num)
    {
        $this->num = $num;
    }

    /**
     * @param string $key
     * @throws ItemNotFound
     */
    public function getUndefinedItem(string $key)
    {
        throw new ItemNotFound($key, $this);
    }

    /**
     * @param string $key
     * @throws FieldNotExist
     */
    public function getUnknownField(string $key)
    {
        throw new FieldNotExist($key, $this);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "Container#{$this->num}";
    }

    /**
     * @param mixed $ns
     * @throws InvalidConfig
     */
    public static function thrower($ns)
    {
        $t = new thrower\Thrower();
        self::$file = __FILE__;
        self::$line = __LINE__ + 1;
        $t->run($ns);
    }

    /**
     * @var string
     */
    public static $file;

    /**
     * @var int
     */
    public static $line;

    /**
     * @var int
     */
    private $num;
}
