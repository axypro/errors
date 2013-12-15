<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\helpers;

use axy\errors\tests\nstst\CustomError;

/**
 * @coversDefaultClass axy\errors\helpers\MessageBuilder
 */
class MessageBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::__construct
     * @covers ::createMessage
     */
    public function testOriginalMessage()
    {
        $e = new CustomError('Original message', 4);
        $this->assertSame('Original message', $e->getMessage());
    }

    /**
     * @covers ::__construct
     * @covers ::createMessage
     */
    public function testDefaultMessage()
    {
        $e = new CustomError();
        $this->assertSame('{{ a }} + {{ b }} = {{ code }}', $e->getMessage());
    }

    /**
     * @covers ::__construct
     * @covers ::createMessage
     */
    public function testTemplateMessage()
    {
        $e = new CustomError(['a' => 2, 'b' => '2',], 4);
        $this->assertSame('2 + 2 = 4', $e->getMessage());
    }

    /**
     * @covers ::__construct
     * @covers ::createMessage
     */
    public function testTemplateMessageEmptyVar()
    {
        $e = new CustomError([], 4);
        $this->assertSame(' +  = 4', $e->getMessage());
    }

    /**
     * @covers ::__construct
     * @covers ::createMessage
     */
    public function testTemplateMessageReplaceCode()
    {
        $e = new CustomError(['a' => 2, 'b' => '2', 'code' => 5,], 4);
        $this->assertSame('2 + 2 = 5', $e->getMessage());
    }
}
