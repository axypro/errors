<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\ContainerReadOnly;

/**
 * coversDefaultClass axy\errors\ContainerReadOnly
 */
class ContainerReadOnlyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::__construct
     * covers ::getContainer
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new ContainerReadOnly('Cont', $previous);
        $this->assertInstanceOf('Exception', $e);
        $this->assertInstanceOf('LogicException', $e);
        $this->assertInstanceOf('axy\errors\Error', $e);
        $this->assertInstanceOf('axy\errors\Logic', $e);
        $this->assertInstanceOf('axy\errors\Forbidden', $e);
        $this->assertInstanceOf('axy\errors\ReadOnly', $e);
        $this->assertSame('Cont', $e->getContainer());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Cont is read-only', $e->getMessage());
    }
}
