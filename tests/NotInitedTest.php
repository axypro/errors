<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\NotInited;
use RuntimeException;

/**
 * coversDefaultClass axy\errors\NotInited
 */
class NotInitedTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getObject
     */
    public function testCreate(): void
    {
        $previous = new RuntimeException('msg');
        $e = new NotInited('Obj', $previous);
        $this->assertSame('Obj', $e->getObject());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Obj is not initialized', $e->getMessage());
    }
}
