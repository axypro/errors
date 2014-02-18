<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * The error of a value type
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
class TypingError extends Logic implements InvalidValue
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ varname }} must be {{ expected }}';

    /**
     * Constructor
     *
     * @param string $varname [optional]
     * @param string|array $expected [optional]
     * @param \Exception $previous [optional]
     * @param mixed $thrower [optional]
     */
    public function __construct($varname = null, $expected = null, \Exception $previous = null, $thrower = null)
    {
        $this->varname = $varname;
        if (\is_array($expected)) {
            $this->expected = $expected;
            if (\count($expected) > 0) {
                $last = \array_pop($expected);
                if (!empty($expected)) {
                    $expected = \implode(', ', $expected).' or '.$last;
                } else {
                    $expected = $last;
                }
            } else {
                $expected = 'a different type';
            }
        } elseif ($expected !== null) {
            $this->expected = [$expected];
        } else {
            $this->expected = [];
            $expected = 'a different type';
        }
        $message = [
            'varname' => $varname ?: 'A value',
            'expected' => $expected,
        ];
        parent::__construct($message, 0, $previous, $thrower);
    }

    /**
     * @return string
     */
    public function getVarname()
    {
        return $this->varname;
    }

    /**
     * @return array
     */
    public function getExpected()
    {
        return $this->expected;
    }

    /**
     * @var array
     */
    protected $varname;

    /**
     * @var array
     */
    protected $expected;
}
