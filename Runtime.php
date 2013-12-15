<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * The basic runtime-error in the axy hierarchy
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class Runtime extends \RuntimeException implements Error
{
}
