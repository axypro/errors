<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\InvalidConfig;

/**
 * @coversDefaultClass axy\errors\InvalidConfig
 */
class InvalidConfigTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getConfigName
     * @covers ::getErrmsg
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new InvalidConfig('MyConfig', 'oh, error', 2, $previous);
        $this->assertSame('MyConfig', $e->getConfigName());
        $this->assertSame('oh, error', $e->getErrmsg());
        $this->assertSame(2, $e->getCode());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('MyConfig has an invalid format: "oh, error"', $e->getMessage());
    }
}
