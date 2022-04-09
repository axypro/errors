<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\ContainerReadOnly;
use RuntimeException;

/**
 * coversDefaultClass axy\errors\ContainerReadOnly
 */
class ContainerReadOnlyTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getContainer
     */
    public function testCreate(): void
    {
        $previous = new RuntimeException('msg');
        $e = new ContainerReadOnly('Cont', $previous);
        $this->assertInstanceOf('Exception', $e);
        $this->assertInstanceOf('LogicException', $e);
        $this->assertInstanceOf('axy\errors\Error', $e);
        $this->assertInstanceOf('axy\errors\Logic', $e);
        $this->assertInstanceOf('axy\errors\Forbidden', $e);
        $this->assertInstanceOf('axy\errors\ReadOnlyException', $e);
        $this->assertSame('Cont', $e->getContainer());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Cont is read-only', $e->getMessage());
    }
}
