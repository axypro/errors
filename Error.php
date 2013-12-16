<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * The basic error in the axy hierarchy
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
interface Error
{
    /**
     * Get the original file (before truncate the trace)
     *
     * @return int
     */
    public function getOriginalFile();

    /**
     * Get the original line (before truncate the trace)
     *
     * @return int
     */
    public function getOriginalLine();

    /**
     * Get the truncated trace instance
     *
     * @return \axy\backtrace\ExceptionTrace
     */
    public function getTruncatedTrace();
}
