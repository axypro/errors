<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\tst\errors;

class Pointless extends \axy\errors\Pointless implements Error
{
    /** {@inheritdoc} */
    protected $howTruncateTrace = false;
}
