<?php

namespace axy\errors\tests\nstst;

class CustomError extends \axy\errors\Logic
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ a }} + {{ b }} = {{ code }}';
}
