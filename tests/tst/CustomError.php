<?php
/**
 * @package axy\errors
 */

namespace axy\errors\tests\tst;

use axy\errors\Logic;

class CustomError extends Logic
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ a }} + {{ b }} = {{ code }}';
}
