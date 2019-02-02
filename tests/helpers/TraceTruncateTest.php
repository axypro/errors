<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests\helpers;

use PHPUnit\Framework\TestCase;
use axy\errors\InvalidConfig;
use axy\errors\tests\tst\errors\{
    InvalidConfig as CustomInvalidConfig,
    Pointless
};
use axy\errors\tests\tst\{
    Invalid,
    Container,
    ContextTruncated
};

/**
 * coversDefaultClass axy\errors\helpers\TraceTruncate
 */
class TraceTruncateTest extends TestCase
{
    /**
     * test*() methods invoked via Reflection (has not key "file")
     *
     * @param bool $inherit
     * @return ContextTruncated
     */
    private function getErrorContext(bool $inherit): ContextTruncated
    {
        $obj = new Invalid($inherit);
        $line = null;
        $e = null;
        try {
            $line = __LINE__ + 1;
            $obj->begin(1);
            $this->fail('not thrown');
        } catch (InvalidConfig $e) {
        }
        $context = new ContextTruncated();
        $context->obj = $obj;
        $context->line = $line;
        $context->file = __FILE__;
        $context->e = $e;
        return $context;
    }

    public function testCustomNS(): void
    {
        $context = $this->getErrorContext(true);
        $e = $context->e;
        $this->assertInstanceOf('Exception', $e);
        $this->assertInstanceOf('LogicException', $e);
        $this->assertInstanceOf('axy\errors\Error', $e);
        $this->assertInstanceOf('axy\errors\Logic', $e);
        $this->assertInstanceOf('axy\errors\InvalidConfig', $e);
        $this->assertInstanceOf('\axy\errors\tests\tst\errors\Error', $e);
        $this->assertSame('Config has an invalid format: "errmsg"', $e->getMessage());
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
        $this->assertSame(2, count($e->getTrace()) - count($trace));
    }

    public function testAxyNS(): void
    {
        $context = $this->getErrorContext(false);
        $e = $context->e;
        $this->assertInstanceOf('axy\errors\InvalidConfig', $e);
        $this->assertNotInstanceOf('\axy\errors\tests\tst\errors\Error', $e);
        $this->assertSame('Config has an invalid format: "no msg"', $e->getMessage());
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

    public function testOutNS(): void
    {
        $line = null;
        try {
            $line = __LINE__ + 1;
            throw new CustomInvalidConfig();
        } catch (CustomInvalidConfig $e) {
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

    public function testNotTruncate(): void
    {
        $obj = new Invalid(true);
        $e = null;
        try {
            $obj->pointless();
            $this->fail('not thrown');
        } catch (Pointless $e) {
        }
        $this->assertSame($obj->file, $e->getFile());
        $this->assertSame($obj->line, $e->getLine());
    }

    public function testThrowerNull(): void
    {
        $line = null;
        $e = null;
        try {
            $line = __LINE__ + 1;
            Container::thrower(null);
            $this->fail('not thrown');
        } catch (CustomInvalidConfig $e) {
        }
        $this->assertSame(__FILE__, $e->getFile());
        $this->assertSame($line, $e->getLine());
    }

    public function testThrowerThis(): void
    {
        $e = null;
        try {
            Container::thrower(true);
            $this->fail('not thrown');
        } catch (CustomInvalidConfig $e) {
        }
        $this->assertSame(Container::$file, $e->getFile());
        $this->assertSame(Container::$line, $e->getLine());
    }

    public function testThrowerNS(): void
    {
        $line = null;
        $e = null;
        try {
            $line = __LINE__ + 1;
            Container::thrower('axy\errors\tests\tst');
            $this->fail('not thrown');
        } catch (CustomInvalidConfig $e) {
        }
        $this->assertSame(__FILE__, $e->getFile());
        $this->assertSame($line, $e->getLine());
    }
}
