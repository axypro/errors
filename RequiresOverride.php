<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * A method requires override
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class RequiresOverride extends Logic implements ReadOnly
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'Method {{ method }} requires override';

    /**
     * Constructor
     *
     * @param string $method
     * @param \Exception $previous
     */
    public function __construct($method = true, \Exception $previous = null)
    {
        if ($method === true) {
            $trace = \debug_backtrace();
            $method = '';
            if (isset($trace[1])) {
                $trace = $trace[1];
                if (!empty($trace['class'])) {
                    $method .= $trace['class'].'::';
                }
                if (!empty($trace['function'])) {
                    $method .= $trace['function'];
                }
            }
        }
        $this->method = $method;
        $message = [
            'method' => $method,
        ];
        parent::__construct($message, 0, $previous);
    }

    /**
     * @return string
     */
    final public function getMethod()
    {
        return $this->method;
    }

    /**
     * @var string
     */
    protected $method;
}
