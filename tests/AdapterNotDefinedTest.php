<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\AdapterNotDefined;

/**
 * coversDefaultClass axy\errors\AdapterNotDefined
 */
class AdapterNotDefinedTest extends TestCase
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
