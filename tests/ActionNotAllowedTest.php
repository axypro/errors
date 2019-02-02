<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\ActionNotAllowed;

/**
 * coversDefaultClass axy\errors\ActionNotAllowed
 */
class ActionNotAllowedTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getAction
     * covers ::getObject
     * covers ::getReason
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new ActionNotAllowed('save', 'user', 'anonym', $previous);
        $this->assertSame('save', $e->getAction());
        $this->assertSame('user', $e->getObject());
        $this->assertSame('anonym', $e->getReason());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Action "save" is not allowed for user (anonym)', $e->getMessage());
    }
}
