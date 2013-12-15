<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * An item was not found in an variable container at the current moment
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class ItemNotFound extends Runtime
{
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
        $message = 'Item "'.$key.'" is not found in "'.$container.'"';
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
