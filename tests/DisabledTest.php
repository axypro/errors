<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\Disabled;

/**
 * coversDefaultClass axy\errors\Disabled
 */
class DisabledTest extends TestCase
{
    /**
     * covers ::__construct
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new Disabled('Srv', $previous);
        $this->assertInstanceOf('Exception', $e);
        $this->assertInstanceOf('LogicException', $e);
        $this->assertInstanceOf('axy\errors\Error', $e);
        $this->assertInstanceOf('axy\errors\Logic', $e);
        $this->assertInstanceOf('axy\errors\Forbidden', $e);
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Srv is disabled', $e->getMessage());
        $this->assertSame('Srv', $e->getService());
    }
}
