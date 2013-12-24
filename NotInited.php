<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * Object is not initialized
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
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
