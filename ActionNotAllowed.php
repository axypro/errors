<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * This action is not allowed for this object
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
class ActionNotAllowed extends Logic
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'Action "{{ action }}" is not allowed for {{ object }} ({{ reason}})';

    /**
     * Constructor
     *
     * @param string $action
     * @param mixed $object
     * @param string $reason
     * @param \Exception $previous
     * @param mixed $thrower
     */
    public function __construct($action, $object, $reason, \Exception $previous = null, $thrower = null)
    {
        $this->action = $action;
        $this->object = $object;
        $this->reason = $reason;
        $message = [
            'action' => $action,
            'object' => $object,
            'reason' => $reason,
        ];
        parent::__construct($message, 0, $previous, $thrower);
    }

    /**
     * @return string
     */
    final public function getAction()
    {
        return $this->action;
    }

    /**
     * @return mixed
     */
    final public function getObject()
    {
        return $this->object;
    }

    /**
     * @return string
     */
    final public function getReason()
    {
        return $this->reason;
    }

    /**
     * @var string
     */
    protected $action;

    /**
     * @var mixed
     */
    protected $object;

    /**
     * @var string
     */
    protected $reason;
}
