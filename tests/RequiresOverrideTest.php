<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\RequiresOverride;

/**
 * coversDefaultClass axy\errors\RequiresOverride
 */
class RequiresOverrideTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getMethod
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new RequiresOverride('MyClass::myMethod', $previous);
        $this->assertSame('MyClass::myMethod', $e->getMethod());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Method MyClass::myMethod requires override', $e->getMessage());
    }

    /**
     * covers ::__construct
     * covers ::getMethod
     */
    public function testCreateBacktrace()
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
    private function methodToOverride()
    {
        throw new RequiresOverride();
    }
}
