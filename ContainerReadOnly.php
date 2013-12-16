<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * This container is read-only
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
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
     * @param mixed $instance
     * @param string $key
     * @param \Exception $previous
     */
    public function __construct($container = null, \Exception $previous = null)
    {
        $this->container = $container;
        $message = [
            'container' => $container,
        ];
        parent::__construct($message, 0, $previous);
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
