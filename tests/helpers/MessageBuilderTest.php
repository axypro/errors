<?php

declare(strict_types=1);

namespace axy\errors\tests\helpers;

use PHPUnit\Framework\TestCase;
use axy\errors\FieldNotExist;
use axy\errors\tests\tst\Container;
use axy\errors\tests\tst\CustomError;
use axy\errors\tests\tst\Invalid;

/**
 * coversDefaultClass axy\errors\helpers\MessageBuilder
 */
class MessageBuilderTest extends TestCase
{
    /**
     * covers ::createMessage
     */
    public function testOriginalMessage(): void
    {
        $e = new CustomError('Original message', 4);
        $this->assertSame('Original message', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testDefaultMessage(): void
    {
        $e = new CustomError();
        $this->assertSame('{{ a }} + {{ b }} = {{ code }}', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testTemplateMessage(): void
    {
        $e = new CustomError(['a' => 2, 'b' => '2'], 4);
        $this->assertSame('2 + 2 = 4', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testTemplateMessageEmptyVar(): void
    {
        $e = new CustomError([], 4);
        $this->assertSame(' +  = 4', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testTemplateMessageReplaceCode(): void
    {
        $e = new CustomError(['a' => 2, 'b' => '2', 'code' => 5], 4);
        $this->assertSame('2 + 2 = 5', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testObjectToString(): void
    {
        try {
            $container = new Container(3);
            throw new FieldNotExist('f', $container);
        } catch (FieldNotExist $e) {
            $this->assertSame('Field "f" is not exist in "Container#3"', $e->getMessage());
        }
        try {
            $inv = new Invalid(false);
            throw new FieldNotExist('f', $inv);
        } catch (FieldNotExist $e) {
            $this->assertSame('Field "f" is not exist in "axy\errors\tests\tst\Invalid"', $e->getMessage());
        }
    }
}
