<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * The basic logic-error in the axy hierarchy
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class Logic extends \LogicException implements Error
{
    use helpers\ErrorTrait;

    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        $this->callErrorTrait($message, $code, $previous);
    }
}
