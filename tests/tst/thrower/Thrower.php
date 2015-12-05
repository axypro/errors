<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\tst\thrower;

use axy\errors\tests\tst\errors\InvalidConfig;

class Thrower
{
    /**
     * @param string $ns
     * @throws \axy\errors\tests\tst\errors\InvalidConfig
     */
    public function run($ns)
    {
        $this->raise($ns);
    }

    /**
     * @param string $ns
     * @throws \axy\errors\tests\tst\errors\InvalidConfig
     */
    private function raise($ns)
    {
        if ($ns === true) {
            $ns = $this;
        }
        throw new InvalidConfig(null, null, 0, null, $ns);
    }
}
