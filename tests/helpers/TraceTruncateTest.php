<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\helpers;

use axy\errors\tests\nstst\Invalid;

/**
 * @coversDefaultClass axy\errors\helpers\TraceTruncate
 */
class TraceTruncateTest extends \PHPUnit_Framework_TestCase
{
    /**
     * test*() methods invoked via Reflection (has not key "file")
     *
     * @param boolean $inherit
     */
    private function getErrorContext($inherit)
    {
        $obj = new Invalid($inherit);
        try {
            $line = __LINE__ + 1;
            $obj->begin(1);
            $this->fail('not thrown');
        } catch (\axy\errors\InvalidConfig $e) {
        }
        return (object)[
            'obj' => $obj,
            'line' => $line,
            'file' => __FILE__,
            'e' => $e,
        ];
    }

    public function testCustomNS()
    {
        $context = $this->getErrorContext(true);
        $e = $context->e;
        $this->assertInstanceOf('Exception', $e);
        $this->assertInstanceOf('LogicException', $e);
        $this->assertInstanceOf('axy\errors\Error', $e);
        $this->assertInstanceOf('axy\errors\Logic', $e);
        $this->assertInstanceOf('axy\errors\InvalidConfig', $e);
        $this->assertInstanceOf('\axy\errors\tests\nstst\errors\Error', $e);
        $this->assertSame('Config Config is invalid: "errmsg"', $e->getMessage());
        $this->assertSame($context->file, $e->getFile());
        $this->assertSame($context->line, $e->getLine());
        $this->assertSame($context->obj->file, $e->getOriginalFile());
        $this->assertSame($context->obj->line, $e->getOriginalLine());
        $trace = $e->getTruncatedTrace();
        $this->assertInstanceOf('axy\backtrace\ExceptionTrace', $trace);
        $this->assertSame($context->file, $trace->file);
        $this->assertSame($context->line, $trace->line);
        $this->assertSame($context->obj->file, $trace->originalFile);
        $this->assertSame($context->obj->line, $trace->originalLine);
        $this->assertEquals($e->getTrace(), $trace->originalItems);
        $this->assertSame($context->obj->file, $trace->originalItems[0]['file']);
        $this->assertSame($context->file, $trace->items[0]['file']);
    }

    public function testAxyNS()
    {
        $context = $this->getErrorContext(false);
        $e = $context->e;
        $this->assertInstanceOf('axy\errors\InvalidConfig', $e);
        $this->assertNotInstanceOf('\axy\errors\tests\nstst\errors\Error', $e);
        $this->assertSame('Config Config is invalid: "no msg"', $e->getMessage());
        $this->assertSame($context->obj->file, $e->getFile());
        $this->assertSame($context->obj->line, $e->getLine());
        $this->assertSame($context->obj->file, $e->getOriginalFile());
        $this->assertSame($context->obj->line, $e->getOriginalLine());
        $trace = $e->getTruncatedTrace();
        $this->assertInstanceOf('axy\backtrace\ExceptionTrace', $trace);
        $this->assertSame($context->obj->file, $trace->file);
        $this->assertSame($context->obj->line, $trace->line);
        $this->assertSame($context->obj->file, $trace->originalFile);
        $this->assertSame($context->obj->line, $trace->originalLine);
        $this->assertEquals($e->getTrace(), $trace->items);
        $this->assertEquals($e->getTrace(), $trace->originalItems);
        $this->assertSame($context->obj->file, $trace->items[0]['file']);
    }

    public function testOutNS()
    {
        try {
            $line = __LINE__ + 1;
            throw new \axy\errors\tests\nstst\errors\InvalidConfig();
        } catch (\axy\errors\tests\nstst\errors\InvalidConfig $e) {
        }
        $this->assertSame(__FILE__, $e->getFile());
        $this->assertSame($line, $e->getLine());
        $this->assertSame(__FILE__, $e->getOriginalFile());
        $this->assertSame($line, $e->getOriginalLine());
        $trace = $e->getTruncatedTrace();
        $this->assertInstanceOf('axy\backtrace\ExceptionTrace', $trace);
        $this->assertSame(__FILE__, $trace->file);
        $this->assertSame($line, $trace->line);
        $this->assertSame(__FILE__, $trace->originalFile);
        $this->assertSame($line, $trace->originalLine);
        $this->assertEquals($e->getTrace(), $trace->items);
        $this->assertEquals($e->getTrace(), $trace->originalItems);
    }

    public function testNotTruncate()
    {
        $obj = new Invalid(true);
        try {
            $obj->pointless();
            $this->fail('not thrown');
        } catch (\axy\errors\tests\nstst\errors\Pointless $e) {
        }
        $this->assertSame($obj->file, $e->getFile());
        $this->assertSame($obj->line, $e->getLine());
    }
}
