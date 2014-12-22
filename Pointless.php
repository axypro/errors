<?php
/**
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\errors;

/**
 * This action is pointless in the current context
 */
class Pointless extends Logic implements Forbidden
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'This action is pointless in the current context';
}
