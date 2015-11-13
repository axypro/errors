<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\tst\errors;

use axy\errors\Pointless as StandardPointless;

class Truncated extends StandardPointless implements Error
{
    /**
     * {@inheritdoc}
     */
    protected $truncateNativeTrace = true;
}
