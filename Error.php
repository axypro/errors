<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * The basic error in the axy hierarchy
 *
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 */
interface Error
{
    /**
     * Returns the file name of the original exception point
     *
     * @return int
     */
    public function getOriginalFile();

    /**
     * Returns the code line of the original exception point
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
