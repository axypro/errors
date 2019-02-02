<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests\tst;

class ContextTruncated
{
    /**
     * @var int
     */
    public $line;

    /**
     * @var \axy\errors\tests\tst\Invalid
     */
    public $obj;

    /**
     * @var string
     */
    public $file;

    /**
     * @var \axy\errors\InvalidConfig
     */
    public $e;
}
