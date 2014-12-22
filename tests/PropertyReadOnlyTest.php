<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\PropertyReadOnly;

/**
 * coversDefaultClass axy\errors\PropertyReadOnly
 */
class PropertyReadOnlyTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::__construct
     * covers ::getContainer
     * covers ::getKey
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new PropertyReadOnly('Cont', 'prop', $previous);
        $this->assertInstanceOf('Exception', $e);
        $this->assertInstanceOf('LogicException', $e);
        $this->assertInstanceOf('axy\errors\Error', $e);
        $this->assertInstanceOf('axy\errors\Logic', $e);
        $this->assertInstanceOf('axy\errors\Forbidden', $e);
        $this->assertInstanceOf('axy\errors\ReadOnly', $e);
        $this->assertSame('Cont', $e->getContainer());
        $this->assertSame('prop', $e->getKey());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Property Cont::$prop is read-only', $e->getMessage());
    }
}
