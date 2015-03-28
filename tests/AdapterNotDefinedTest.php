<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\AdapterNotDefined;

/**
 * coversDefaultClass axy\errors\AdapterNotDefined
 */
class AdapterNotDefinedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::__construct
     * covers ::getAdapter
     * covers ::getService
     */
    public function testCreate()
    {
        $ep = new \RuntimeException('msg');
        $e = new AdapterNotDefined('sqlMy', 'DB', $ep);
        $this->assertSame('Adapter "sqlMy" is not defined for "DB"', $e->getMessage());
        $this->assertSame('sqlMy', $e->getAdapter());
        $this->assertSame('DB', $e->getService());
        $this->assertSame($ep, $e->getPrevious());
    }
}
