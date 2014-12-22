<?php
/**
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\errors;

/**
 * A value is not valid for this action
 */
class NotValid extends Logic implements InvalidValue
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'Value of {{ varname }} is not valid: {{ errmsg }}';

    /**
     * The constructor
     *
     * @param string $varname [optional]
     *        name of a variable who contains the value
     * @param string $errmsg [optional]
     *        the error message
     * @param \Exception $previous [optional]
     * @param mixed $thrower [optional]
     */
    public function __construct($varname = null, $errmsg = null, \Exception $previous = null, $thrower = null)
    {
        $message = [
            'varname' => $varname,
            'errmsg' => $errmsg,
        ];
        $this->varname = $varname;
        $this->errmsg = $errmsg;
        parent::__construct($message, 0, $previous, $thrower);
    }

    /**
     * @return string
     */
    final public function getVarname()
    {
        return $this->varname;
    }

    /**
     * @return string
     */
    final public function getErrmsg()
    {
        return $this->errmsg;
    }

    /**
     * @var string
     */
    protected $varname;

    /**
     * @var string
     */
    protected $errmsg;
}
