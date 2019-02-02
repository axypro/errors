<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use axy\errors\Pointless;

/**
 * coversDefaultClass axy\errors\Pointless
 */
class PointlessTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::__construct
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new Pointless('Oh', 0, $previous);
        $this->assertInstanceOf('Exception', $e);
        $this->assertInstanceOf('LogicException', $e);
        $this->assertInstanceOf('axy\errors\Error', $e);
        $this->assertInstanceOf('axy\errors\Logic', $e);
        $this->assertInstanceOf('axy\errors\Forbidden', $e);
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Oh', $e->getMessage());
        $e2 = new Pointless();
        $this->assertSame('This action is pointless in the current context', $e2->getMessage());
    }
}
