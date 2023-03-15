<?php

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\RequiresOverride;
use RuntimeException;

/**
 * coversDefaultClass axy\errors\RequiresOverride
 */
class RequiresOverrideTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getMethod
     */
    public function testCreate(): void
    {
        $previous = new RuntimeException('msg');
        $e = new RequiresOverride('MyClass::myMethod', $previous);
        $this->assertSame('MyClass::myMethod', $e->getMethod());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Method MyClass::myMethod requires override', $e->getMessage());
    }

    /**
     * covers ::__construct
     * covers ::getMethod
     */
    public function testCreateBacktrace(): void
    {
        $e = null;
        try {
            $this->methodToOverride();
        } catch (RequiresOverride $e) {
        }
        $this->assertSame('axy\errors\tests\RequiresOverrideTest::methodToOverride', $e->getMethod());
        $expected = 'Method axy\errors\tests\RequiresOverrideTest::methodToOverride requires override';
        $this->assertSame($expected, $e->getMessage());
    }

    /**
     * @throws \axy\errors\RequiresOverride
     */
    private function methodToOverride(): void
    {
        throw new RequiresOverride();
    }
}
