<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\FieldNotExist;
use axy\errors\tests\nstst\Container;

/**
 * @coversDefaultClass axy\errors\FieldNotExist
 */
class FieldNotExistTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::getKey
     * @covers ::getContainer
     */
    public function testCreate()
    {
        $container = new Container(7);
        try {
            $container->getUnknownField('prop');
            $this->fail('not thrown');
        } catch (FieldNotExist $e) {
        }
        $this->assertSame('prop', $e->getKey());
        $this->assertSame($container, $e->getContainer());
        $this->assertSame('Field "prop" is not exist in "Container#7"', $e->getMessage());
    }

    /**
     * @covers ::__construct
     */
    public function testPrevious()
    {
        $previous = new \RuntimeException('msg');
        $e = new FieldNotExist('key', 'container', $previous);
        $this->assertSame($previous, $e->getPrevious());
    }
}
