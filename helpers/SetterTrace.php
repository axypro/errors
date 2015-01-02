<?php
/**
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\errors\helpers;

/**
 * Helper which sets a trace for an exception instance
 */
class SetterTrace
{
    /**
     * Sets a trace for an exception
     *
     * @param \Exception $e
     * @param array $trace
     */
    public static function setTrace(\Exception $e, array $trace)
    {
        $setter = new self($e);
        $setter($trace);
    }

    /**
     * The constructor
     *
     * @param \Exception $e
     */
    public function __construct(\Exception $e)
    {
        $this->set = function ($trace) {
            $this->trace = $trace;
        };
        $this->set = $this->set->bindTo($e, 'Exception');
    }

    /**
     * Invoke: set a trace for the exception
     *
     * @param array $trace
     */
    public function __invoke(array $trace)
    {
        $this->set->__invoke($trace);
    }

    /**
     * @var \Closure
     */
    private $set;
}
