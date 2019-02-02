<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests\tst;

use axy\errors\InvalidConfig;

class ContextTruncated
{
    /**
     * @var int
     */
    public $line;

    /**
     * @var Invalid
     */
    public $obj;

    /**
     * @var string
     */
    public $file;

    /**
     * @var InvalidConfig
     */
    public $e;
}
