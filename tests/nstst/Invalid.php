<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\nstst;

class Invalid
{
    /**
     * @var string
     */
    public $file;

    /**
     * @var int
     */
    public $line;

    /**
     * @param boolean $inherit
     */
    public function __construct($inherit)
    {
        $this->inherit = $inherit;
    }

    /**
     * @param int $x
     * @throws \axy\errors\InvalidConfig
     */
    public function begin($x)
    {
        return $this->cont($x, 2);
    }

    /**
     * @throws \axy\errors\tests\nstst\errors\Pointless
     */
    public function pointless()
    {
        $this->file = __FILE__;
        $this->line = __LINE__ + 1;
        throw new \axy\errors\tests\nstst\errors\Pointless();
    }

    /**
     * @param int $x
     * @param int $y
     * @throws \axy\errors\InvalidConfig
     */
    private function cont($x, $y)
    {
        $this->finish($x + $y);
    }

    /**
     * @param int $z
     * @throws \axy\errors\InvalidConfig
     */
    private function finish($z)
    {
        $this->file = __FILE__;
        if ($this->inherit) {
            $this->line = __LINE__ + 1;
            throw new errors\InvalidConfig('Config', 'errmsg');
        } else {
            $this->line = __LINE__ + 1;
            throw new \axy\errors\InvalidConfig('Config', 'no msg');
        }
    }

    /**
     * @var boolean
     */
    private $inherit;
}
