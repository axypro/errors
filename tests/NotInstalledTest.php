<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use axy\errors\NotInstalled;

/**
 * coversDefaultClass axy\errors\NotInstalled
 */
class NotInstalledTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::__construct
     * covers ::getDependency
     * covers ::getAction
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new NotInstalled('mbstring', 'unicode string', $previous);
        $this->assertSame('mbstring', $e->getDependency());
        $this->assertSame('unicode string', $e->getAction());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Required dependency "mbstring" for unicode string', $e->getMessage());
        $e1 = new NotInstalled('Plugin');
        $this->assertNull($e1->getAction());
        $this->assertSame('Required dependency "Plugin" for something', $e1->getMessage());
    }
}
