<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\nstst\errors;

class Pointless extends \axy\errors\Pointless implements Error
{
    /** {@inheritdoc} */
    protected $howTruncateTrace = false;
}
