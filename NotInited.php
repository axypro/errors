<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * An object is not initialized
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
class NotInited extends Logic implements ReadOnly
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ object }} is not initialized';

    /**
     * Constructor
     *
     * @param mixed $object [optional]
     * @param \Exception $previous [optional]
     * @param mixed $thrower [optional]
     */
    public function __construct($object = null, \Exception $previous = null, $thrower = null)
    {
        $this->object = $object;
        $message = [
            'object' => $object,
        ];
        parent::__construct($message, 0, $previous, $thrower);
    }

    /**
     * @return mixed
     */
    final public function getObject()
    {
        return $this->object;
    }

    /**
     * @var mixed
     */
    protected $object;
}
