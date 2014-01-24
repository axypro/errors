<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * This service is disabled in the current environment
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
class Disabled extends Logic implements Forbidden
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ service }} is disabled';

    /**
     * Constructor
     *
     * @param mixed $service [optional]
     * @param \Exception $previous
     * @param object $thrower [optional]
     */
    public function __construct($service = null, \Exception $previous = null, $thrower = null)
    {
        $this->service = $service;
        $message = [
            'service' => $service,
        ];
        parent::__construct($message, 0, $previous, $thrower);
    }

    /**
     * Get the disabled service
     *
     * @return mixed
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * @var mixed
     */
    private $service;
}
