<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\helpers;

use axy\errors\tests\nstst\CustomError;

/**
 * coversDefaultClass axy\errors\helpers\MessageBuilder
 */
class MessageBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * covers ::createMessage
     */
    public function testOriginalMessage()
    {
        $e = new CustomError('Original message', 4);
        $this->assertSame('Original message', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testDefaultMessage()
    {
        $e = new CustomError();
        $this->assertSame('{{ a }} + {{ b }} = {{ code }}', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testTemplateMessage()
    {
        $e = new CustomError(['a' => 2, 'b' => '2'], 4);
        $this->assertSame('2 + 2 = 4', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testTemplateMessageEmptyVar()
    {
        $e = new CustomError([], 4);
        $this->assertSame(' +  = 4', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testTemplateMessageReplaceCode()
    {
        $e = new CustomError(['a' => 2, 'b' => '2', 'code' => 5], 4);
        $this->assertSame('2 + 2 = 5', $e->getMessage());
    }

    /**
     * covers ::createMessage
     */
    public function testObjectToString()
    {
        try {
            $container = new \axy\errors\tests\nstst\Container(3);
            throw new \axy\errors\FieldNotExist('f', $container);
        } catch (\axy\errors\FieldNotExist $e) {
            $this->assertSame('Field "f" is not exist in "Container#3"', $e->getMessage());
        }
        try {
            $inv = new \axy\errors\tests\nstst\Invalid(false);
            throw new \axy\errors\FieldNotExist('f', $inv);
        } catch (\axy\errors\FieldNotExist $e) {
            $this->assertSame('Field "f" is not exist in "axy\errors\tests\nstst\Invalid"', $e->getMessage());
        }
    }
}
