<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\Disabled;

/**
 * coversDefaultClass axy\errors\Disabled
 */
class DisabledTest extends \PHPUnit_Framework_TestCase
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
    }
}
