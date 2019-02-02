<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use axy\errors\AlreadyInited;

/**
 * coversDefaultClass axy\errors\AlreadyInited
 */
class AlreadyInitedTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::__construct
     * covers ::getObject
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new AlreadyInited('Obj', $previous);
        $this->assertSame('Obj', $e->getObject());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Obj has already been initialized', $e->getMessage());
    }
}
