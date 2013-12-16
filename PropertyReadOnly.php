<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * This property is read-only
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class PropertyReadOnly extends Logic implements ReadOnly
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'Property {{ container }}::${{ key }} is read-only';

    /**
     * Constructor
     *
     * @param mixed $container
     * @param string $key
     * @param \Exception $previous
     */
    public function __construct($container = null, $key = null, \Exception $previous = null)
    {
        $this->container = $container;
        $this->key = $key;
        $message = [
            'container' => $container,
            'key' => $key,
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
     * @return string
     */
    final public function getKey()
    {
        return $this->key;
    }

    /**
     * @var mixed
     */
    protected $container;

    /**
     * @var string
     */
    protected $key;
}
