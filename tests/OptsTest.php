<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\Opts;
use axy\errors\ItemNotFound;
use axy\errors\tests\nstst\OptHowTruncate;

/**
 * coversDefaultClass axy\errors\Opts
 */
class OptsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        $this->opts = (object)[
            'howTruncateStack' => Opts::getHowTruncateTrace(),
        ];
    }

    public function tearDown()
    {
        Opts::setHowTruncateTrace($this->opts->howTruncateStack);
    }

    /**
     * @covers howTruncateTrace
     */
    public function testHowTruncateTrace()
    {
        Opts::setHowTruncateTrace(false);
        $this->assertSame(false, Opts::getHowTruncateTrace());
        $fn = OptHowTruncate::getFile();
        $e = null;
        try {
            OptHowTruncate::error();
        } catch (ItemNotFound $e) {
        }
        $this->assertSame($fn, $e->getFile());
        $how = 'axy\errors\tests\nstst';
        Opts::setHowTruncateTrace($how);
        $this->assertSame($how, Opts::getHowTruncateTrace());
        try {
            OptHowTruncate::error();
        } catch (ItemNotFound $e) {
        }
        $this->assertSame(__FILE__, $e->getFile());
    }

    /**
     * @var object
     */
    private $opts;
}
