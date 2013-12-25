<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\nstst\thrower;

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
        throw new \axy\errors\tests\nstst\errors\InvalidConfig(null, null, 0, null, $ns);
    }
}
