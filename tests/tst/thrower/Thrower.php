<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\tst\thrower;

use \axy\errors\tests\tst\errors\InvalidConfig;

class Thrower
{
    public function run($ns)
    {
        $this->raise($ns);
    }

    private function raise($ns)
    {
        if ($ns === true) {
            $ns = $this;
        }
        throw new InvalidConfig(null, null, 0, null, $ns);
    }
}
