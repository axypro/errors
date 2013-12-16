<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * This action is pointless in the current context
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class Pointless extends Logic implements Forbidden
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'This action is pointless in the current context';
}
