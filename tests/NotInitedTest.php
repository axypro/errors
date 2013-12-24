<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\NotInited;

/**
 * @coversDefaultClass axy\errors\NotInited
 */
class NotInitedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getObject
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new NotInited('Obj', $previous);
        $this->assertSame('Obj', $e->getObject());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Obj is not initialized', $e->getMessage());
    }
}
