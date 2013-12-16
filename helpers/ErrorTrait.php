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

    public function callErrorTrait($message, $code, $previous)
    {
        $message = $this->createMessage($message, $code);
        parent::__construct($message, $code, $previous);
        $this->truncateTrace();
    }
}
