<?php
/**
 * @package axy\errors
 */

declare(strict_types=1);

namespace axy\errors\tests\tst;

use axy\errors\Logic;

class CustomError extends Logic
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ a }} + {{ b }} = {{ code }}';
}
