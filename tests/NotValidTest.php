<?php

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\NotValid;
use RuntimeException;

/**
 * coversDefaultClass axy\errors\NotValid
 */
class NotValidTest extends TestCase
{
    /**
     * covers ::__construct
     * covers ::getVarname
     * covers ::getErrmsg
     */
    public function testCreate(): void
    {
        $previous = new RuntimeException('msg');
        $e = new NotValid('email', 'is empty', $previous);
        $this->assertSame('email', $e->getVarName());
        $this->assertSame('is empty', $e->getErrorMessage());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Value of email is not valid: is empty', $e->getMessage());
    }
}
