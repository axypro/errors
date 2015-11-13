<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests;

use axy\errors\Opts;
use axy\errors\ItemNotFound;
use axy\errors\tests\tst\OptsHelper;

/**
 * coversDefaultClass axy\errors\Opts
 */
class OptsTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (!$this->opts) {
            $this->opts = (object)[
                'howTruncateTrace' => Opts::getHowTruncateTrace(),
                'truncateTrace' => Opts::getTruncateNativeTrace(),
            ];
        }
    }

    public function tearDown()
    {
        Opts::setHowTruncateTrace($this->opts->howTruncateTrace);
        Opts::setTruncateNativeTrace($this->opts->truncateTrace);
    }

    /**
     * covers setHowTruncateTrace
     * covers getHowTruncateTrace
     */
    public function testHowTruncateTrace()
    {
        Opts::setHowTruncateTrace(false);
        $this->assertSame(false, Opts::getHowTruncateTrace());
        $fn = OptsHelper::getFile();
        $e = null;
        try {
            OptsHelper::error();
        } catch (ItemNotFound $e) {
        }
        $this->assertSame($fn, $e->getFile());
        $how = 'axy\errors\tests\tst';
        Opts::setHowTruncateTrace($how);
        $this->assertSame($how, Opts::getHowTruncateTrace());
        try {
            OptsHelper::error();
        } catch (ItemNotFound $e) {
        }
        $this->assertSame(__FILE__, $e->getFile());
    }

    /**
     * covers setTruncateNativeTrace
     * covers getTruncateNativeTrace
     */
    public function testTruncateNativeTrace()
    {
        Opts::setHowTruncateTrace('axy\errors\tests\tst');
        $fn = OptsHelper::getFile();
        Opts::setTruncateNativeTrace(false);
        $this->assertSame(false, Opts::getTruncateNativeTrace());
        $e = null;
        try {
            OptsHelper::error();
        } catch (ItemNotFound $e) {
        }
        $originalTrace = $e->getTrace();
        $this->assertSame($fn, $originalTrace[0]['file']);
        $this->assertEquals(1, count($originalTrace) - count($e->getTruncatedTrace()->items));
        Opts::setTruncateNativeTrace(true);
        $this->assertSame(true, Opts::getTruncateNativeTrace());
        try {
            OptsHelper::error();
        } catch (ItemNotFound $e) {
        }
        $originalTrace = $e->getTrace();
        $this->assertEquals(count($originalTrace), count($e->getTruncatedTrace()->items));
        $this->assertSame(__FILE__, $originalTrace[0]['file']);
    }

    /**
     * @var object
     */
    private $opts;
}
