<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\helpers;

use axy\errors\helpers\SetterTrace;

/**
 * coversDefaultClass axy\errors\helpers\SetterTrace;
 */
class SetterTraceTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::setTrace
     */
    public function testSetTrace()
    {
        if (version_compare(PHP_VERSION, '7.0.0', '>=')) {
            $this->markTestSkipped('Truncate native trace is not supported since PHP7');
        }
        $e = new \LogicException();
        $originalTrace = $e->getTrace();
        $this->assertNotEmpty($originalTrace);
        $top = $originalTrace[0];
        $this->assertArrayHasKey('function', $top);
        $this->assertSame('testSetTrace', $top['function']);
        $trace = [
            [
                'class' => 'MyClass',
                'function' => 'myMethod',
            ],
        ];
        SetterTrace::setTrace($e, $trace);
        $this->assertEquals($trace, $e->getTrace());
    }
}
