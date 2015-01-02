<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\nstst;

use axy\errors\InvalidConfig;
use axy\errors\tests\nstst\errors\Pointless;
use axy\errors\tests\nstst\errors\Truncated;

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
     * @throws InvalidConfig
     */
    public function begin($x)
    {
        $this->cont($x, 2);
    }

    /**
     * @throws Pointless
     */
    public function pointless()
    {
        $this->file = __FILE__;
        $this->line = __LINE__ + 1;
        throw new Pointless();
    }

    /**
     * @throws Truncated
     */
    public function truncated()
    {
        $this->throwTruncated();
    }

    /**
     * @param int $x
     * @param int $y
     * @throws InvalidConfig
     */
    private function cont($x, $y)
    {
        $this->finish($x + $y);
    }

    private function throwTruncated()
    {
        throw new Truncated('truncated');
    }

    /**
     * @throws InvalidConfig
     */
    private function finish()
    {
        $this->file = __FILE__;
        if ($this->inherit) {
            $this->line = __LINE__ + 1;
            throw new errors\InvalidConfig('Config', 'errmsg');
        } else {
            $this->line = __LINE__ + 1;
            throw new InvalidConfig('Config', 'no msg');
        }
    }

    /**
     * @var boolean
     */
    private $inherit;
}
