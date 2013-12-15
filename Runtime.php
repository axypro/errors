<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * The basic runtime-error in the axy hierarchy
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class Runtime extends \RuntimeException implements Error
{
    use helpers\ErrorTrait;

    public function __construct($message = null, $code = 0, \Exception $previous = null)
    {
        $this->callErrorTrait($message, $code, $previous);
    }
}
