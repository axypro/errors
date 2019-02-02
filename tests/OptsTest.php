<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests;

use PHPUnit\Framework\TestCase;
use axy\errors\Opts;
use axy\errors\ItemNotFound;
use axy\errors\tests\tst\OptsHelper;

/**
 * coversDefaultClass axy\errors\Opts
 */
class OptsTest extends TestCase
{
    public function setUp()
    {
        if (!$this->opts) {
            $this->opts = (object)[
                'howTruncateTrace' => Opts::getHowTruncateTrace(),
            ];
        }
    }

    public function tearDown()
    {
        Opts::setHowTruncateTrace($this->opts->howTruncateTrace);
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
     * @var object
     */
    private $opts;
}
