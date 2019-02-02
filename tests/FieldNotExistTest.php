<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\FieldNotExist;
use axy\errors\tests\tst\Container;

/**
 * coversDefaultClass axy\errors\FieldNotExist
 */
class FieldNotExistTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getKey
     * covers ::getContainer
     */
    public function testCreate()
    {
        $container = new Container(7);
        $e = null;
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
     * covers ::__construct
     */
    public function testPrevious()
    {
        $previous = new \RuntimeException('msg');
        $e = new FieldNotExist('key', 'container', $previous);
        $this->assertSame($previous, $e->getPrevious());
    }
}
