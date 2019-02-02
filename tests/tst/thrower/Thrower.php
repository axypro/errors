<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests\tst\thrower;

use axy\errors\tests\tst\errors\InvalidConfig;

class Thrower
{
    /**
     * @param string $ns
     * @throws InvalidConfig
     */
    public function run($ns): void
    {
        $this->raise($ns);
    }

    /**
     * @param string $ns
     * @throws InvalidConfig
     */
    private function raise($ns)
    {
        if ($ns === true) {
            $ns = $this;
        }
        throw new InvalidConfig(null, null, 0, null, $ns);
    }
}
