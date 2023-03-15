<?php

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\AlreadyInited;
use RuntimeException;

/**
 * coversDefaultClass axy\errors\AlreadyInited
 */
class AlreadyInitedTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getObject
     */
    public function testCreate(): void
    {
        $previous = new RuntimeException('msg');
        $e = new AlreadyInited('Obj', $previous);
        $this->assertSame('Obj', $e->getObject());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Obj has already been initialized', $e->getMessage());
    }
}
