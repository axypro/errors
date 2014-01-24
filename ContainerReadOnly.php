<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * This container is read-only
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
class ContainerReadOnly extends Logic implements ReadOnly
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ container }} is read-only';

    /**
     * Constructor
     *
     * @param mixed $container [optional]
     * @param \Exception $previous [optional]
     * @param mixed $thrower [optional]
     */
    public function __construct($container = null, \Exception $previous = null, $thrower = null)
    {
        $this->container = $container;
        $message = [
            'container' => $container,
        ];
        parent::__construct($message, 0, $previous, $thrower);
    }

    /**
     * @return mixed
     */
    final public function getContainer()
    {
        return $this->container;
    }

    /**
     * @var mixed
     */
    protected $container;
}
