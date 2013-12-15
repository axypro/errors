<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * A field does not exist in a fixed list of the container
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class FieldNotExist extends Logic
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'Field "{{ key }}" is not exist in "{{ container }}"';

    /**
     * Constructor
     *
     * @param string $key
     * @param mixed $container
     * @param \Exception $previous
     */
    public function __construct($key = null, $container = null, \Exception $previous = null)
    {
        $this->key = $key;
        $this->container = $container;
        $message = [
            'key' => $key,
            'container' => $container,
        ];
        parent::__construct($message, 0, $previous);
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
