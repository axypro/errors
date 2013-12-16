<?php
/**
 * @package axy\errors
 */

namespace axy\errors\helpers;

use axy\backtrace\ExceptionTrace;

/**
 * Truncate the exception trace
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
trait TraceTruncate
{
    /**
     * How truncate trace?
     *
     * array - options for Trace::truncate()
     * string - namespace
     * true - up one namespace level
     * false - not truncate
     *
     * @var boolean
     */
    protected $howTruncateTrace = true;

    /**
     * @return int
     */
    final public function getOriginalFile()
    {
        return $this->truncatedTrace->originalFile;
    }

    /**
     * @return int
     */
    final public function getOriginalLine()
    {
        return $this->truncatedTrace->originalLine;
    }

    /**
     * @return \axy\backtrace\ExceptionTrace
     */
    final public function getTruncatedTrace()
    {
        return $this->truncatedTrace;
    }

    /**
     * Truncate the trace by howTruncateTrace options
     */
    private function truncateTrace()
    {
        $this->truncatedTrace = new ExceptionTrace($this->getTrace(), $this->file, $this->line);
        $options = $this->howTruncateTrace;
        if (!$options) {
            return;
        }
        if ($options === true) {
            $ns = \preg_replace('/(\\\\[^\\\\]+)$/s', '', \get_class($this));
            /* True: current NS for errors.
             * It is subnamespace for a target namespace.
             * Truncate it.
             */
            if ($ns === 'axy\errors') {
                /* Trimming for axy\errors will result "axy". And spread to all axy-libs.
                 * Therefore, do not trim it.
                 * Return because axy\errors do not throws any exception.
                 * And return requires for TraceTruncateTest::testAxyNS()
                 */
                return;
            }
            $ns = \preg_replace('/(\\\\[^\\\\]+)$/s', '', $ns);
            $options = [
                'namespace' => $ns,
            ];
        } elseif (!\is_array($options)) {
            $options = [
                'namespace' => $options,
            ];
        }
        $this->truncatedTrace->truncate($options);
        $this->file = $this->truncatedTrace->file;
        $this->line = $this->truncatedTrace->line;
    }

    /**
     * @var \axy\backtrace\ExceptionTrace
     */
    private $truncatedTrace;
}
