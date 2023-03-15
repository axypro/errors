<?php

declare(strict_types=1);

namespace axy\errors\tests\tst\errors;

use axy\errors\InvalidConfig as StandardInvalidConfig;

class InvalidConfig extends StandardInvalidConfig implements Error
{
}
