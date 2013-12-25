<?php
/**
 * @package axy\errors
 */

namespace axy\errors\helpers;

/**
 * The trait for common actions of Runtime and Logic
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
trait ErrorTrait
{
    use MessageBuilder;
    use TraceTruncate;

    /**
     * @param mixed $message
     * @param int $code
     * @param \Exception $previous
     * @param mixed $thrower
     */
    public function callErrorTrait($message, $code, $previous, $thrower)
    {
        $message = $this->createMessage($message, $code);
        parent::__construct($message, $code, $previous);
        $this->truncateTrace($thrower);
    }
}
