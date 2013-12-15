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
     * @return string
     */
    public function __toString()
    {
        return 'Container#'.$this->num;
    }

    /**
     * @var int
     */
    private $num;
}
