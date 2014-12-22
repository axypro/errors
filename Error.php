<?php
/**
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */

namespace axy\errors;

/**
 * The basic error in the axy hierarchy
 */
interface Error
{
    /**
     * Returns the filename of the original exception point
     *
     * @return string
     */
    public function getOriginalFile();

    /**
     * Returns the line number of the original exception point
     *
     * @return int
     */
    public function getOriginalLine();

    /**
     * Returns the truncated trace instance
     *
     * @return \axy\backtrace\ExceptionTrace
     */
    public function getTruncatedTrace();
}
