<?php
/**
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\errors;

/**
 * A configuration has an invalid format
 */
class InvalidConfig extends Logic
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ config }} has an invalid format: "{{ errmsg }}"';

    /**
     * The constructor
     *
     * @param string $config [optional]
     *        the config name
     * @param string $errmsg [optional]
     *        the error message
     * @param int $code [optional]
     *        the error code
     * @param \Exception $previous [optional]
     * @param mixed $thrower [optional]
     */
    public function __construct($config = null, $errmsg = null, $code = 0, \Exception $previous = null, $thrower = null)
    {
        $this->configName = $config;
        $this->errmsg = $errmsg;
        $message = [
            'config' => $config,
            'errmsg' => $errmsg,
        ];
        parent::__construct($message, $code, $previous, $thrower);
    }

    /**
     * @return string
     */
    final public function getConfigName()
    {
        return $this->configName;
    }

    /**
     * @return int
     */
    final public function getErrmsg()
    {
        return $this->errmsg;
    }

    /**
     * @var string
     */
    protected $configName;

    /**
     * @var int
     */
    protected $errmsg;
}
