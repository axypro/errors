<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * A some configuration has an invalid format
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class InvalidConfig extends Logic
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = 'Config {{ config }} is invalid: "{{ errmsg }}"';

    /**
     * Constructor
     *
     * @param string $config [optional]
     * @param string $errmsg [optional]
     * @param int $code [optional]
     * @param \Exception $previous [optional]
     */
    public function __construct($config = null, $errmsg = null, $code = 0, \Exception $previous = null)
    {
        $this->configName = $config;
        $this->errmsg = $errmsg;
        $message = [
            'config' => $config,
            'errmsg' => $errmsg,
        ];
        parent::__construct($message, $code, $previous);
    }

    /**
     * @reutrn string
     */
    public function getConfigName()
    {
        return $this->configName;
    }

    /**
     * @return int
     */
    public function getErrmsg()
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
