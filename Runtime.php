<?php
/**
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\errors;

/**
 * The basic runtime-error in the axy hierarchy
 */
class Runtime extends \RuntimeException implements Error
{
    use helpers\ErrorTrait;

    /**
     * The constructor
     *
     * @param mixed $message [optional]
     *        the error message or variables for the message template
     * @param int $code [optional]
     *        the error code
     * @param \Exception $previous [optional]
     *        the previous exception
     * @param mixed $thrower [optional]
     *        one who has thrown exception (an object or a namespace)
     */
    public function __construct($message = null, $code = 0, \Exception $previous = null, $thrower = null)
    {
        $this->callErrorTrait($message, $code, $previous, $thrower);
    }
}
