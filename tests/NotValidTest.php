<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\NotValid;

/**
 * coversDefaultClass axy\errors\NotValid
 */
class NotValidTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::__construct
     * covers ::getVarname
     * covers ::getErrmsg
     */
    public function testCreate()
    {
        $previous = new \RuntimeException('msg');
        $e = new NotValid('email', 'is empty', $previous);
        $this->assertSame('email', $e->getVarName());
        $this->assertSame('is empty', $e->getErrorMessage());
        $this->assertSame($previous, $e->getPrevious());
        $this->assertSame('Value of email is not valid: is empty', $e->getMessage());
    }
}
