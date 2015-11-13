<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\InvalidFormat;

/**
 * coversDefaultClass axy\errors\InvalidFormat
 */
class InvalidFormatTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::__construct
     * covers ::getValue
     * covers ::getType
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new InvalidFormat('127.0.0.256', 'IP', $previous);
        $this->assertSame('127.0.0.256', $e->getValue());
        $this->assertSame('IP', $e->getType());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('IP "127.0.0.256" has invalid format', $e->getMessage());
    }
}
