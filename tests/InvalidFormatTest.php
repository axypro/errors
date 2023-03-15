<?php

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\InvalidFormat;
use RuntimeException;

/**
 * coversDefaultClass axy\errors\InvalidFormat
 */
class InvalidFormatTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getValue
     * covers ::getType
     */
    public function testCreate(): void
    {
        $previous = new RuntimeException('msg');
        $e = new InvalidFormat('127.0.0.256', 'IP', $previous);
        $this->assertSame('127.0.0.256', $e->getValue());
        $this->assertSame('IP', $e->getType());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('IP "127.0.0.256" has invalid format', $e->getMessage());
    }
}
