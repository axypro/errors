<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests\tst\errors;

use axy\errors\Pointless as StandardPointless;

class Truncated extends StandardPointless implements Error
{
    /**
     * {@inheritdoc}
     */
    protected $truncateNativeTrace = true;
}
