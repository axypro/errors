<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * Attempt to re-initialize the object
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class AlreadyInited extends Logic implements ReadOnly
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ object }} has already been initialized';

    /**
     * Constructor
     *
     * @param mixed $object
     * @param \Exception $previous
     */
    public function __construct($object = null, \Exception $previous = null)
    {
        $this->object = $object;
        $message = [
            'object' => $object,
        ];
        parent::__construct($message, 0, $previous);
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
