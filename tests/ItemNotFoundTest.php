<?php

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\ItemNotFound;
use axy\errors\tests\tst\Container;

/**
 * coversDefaultClass axy\errors\ItemNotFound
 */
class ItemNotFoundTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getKey
     * covers ::getContainer
     */
    public function testCreate(): void
    {
        $container = new Container(5);
        $e = null;
        try {
            $container->getUndefinedItem('qwe');
            $this->fail('not thrown');
        } catch (ItemNotFound $e) {
        }
        $this->assertSame('qwe', $e->getKey());
        $this->assertSame($container, $e->getContainer());
        $this->assertSame('Item "qwe" is not found in "Container#5"', $e->getMessage());
    }

    /**
     * covers ::__construct
     */
    public function testPrevious()
    {
        $previous = new \RuntimeException('msg');
        $e = new ItemNotFound('key', 'container', $previous);
        $this->assertSame($previous, $e->getPrevious());
    }
}
