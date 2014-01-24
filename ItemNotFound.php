<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * An item was not found in a variable container at the current moment
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
class ItemNotFound extends Runtime implements NotFound
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'Item "{{ key }}" is not found in "{{ container }}"';

    /**
     * Constructor
     *
     * @param string $key [optional]
     * @param mixed $container [optional]
     * @param \Exception $previous [optional]
     * @param mixed $thrower [optional]
     */
    public function __construct($key = null, $container = null, \Exception $previous = null, $thrower = null)
    {
        $this->key = $key;
        $this->container = $container;
        $message = [
            'key' => $key,
            'container' => $container,
        ];
        parent::__construct($message, 0, $previous, $thrower);
    }

    /**
     * @return string
     */
    final public function getKey()
    {
        return $this->key;
    }

    /**
     * @return mixed
     */
    final public function getContainer()
    {
        return $this->container;
    }

    /**
     * @var string
     */
    protected $key;

    /**
     * @var mixed
     */
    protected $container;
}
