<?php

declare(strict_types=1);

namespace axy\errors\tests\tst\errors;

use axy\errors\Pointless as StandardPointless;

class Pointless extends StandardPointless implements Error
{
    /** {@inheritdoc} */
    protected $howTruncateTrace = false;
}
