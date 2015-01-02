<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\nstst\errors;

class Truncated extends \axy\errors\Pointless implements Error
{
    /**
     * {@inheritdoc}
     */
    protected $truncateNativeTrace = true;
}
