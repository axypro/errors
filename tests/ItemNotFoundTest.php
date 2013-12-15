<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\ItemNotFound;

/**
 * @coversDefaultClass axy\errors\ItemNotFound
 */
class ItemNotFoundTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getKey
     * @covers ::getContainer
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new ItemNotFound('key', 'Container', $previous);
        $this->assertSame('key', $e->getKey());
        $this->assertSame('Container', $e->getContainer());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Item "key" is not found in "Container"', $e->getMessage());
    }
}
