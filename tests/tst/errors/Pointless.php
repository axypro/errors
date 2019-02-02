<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests\tst\errors;

class Pointless extends \axy\errors\Pointless implements Error
{
    /** {@inheritdoc} */
    protected $howTruncateTrace = false;
}
