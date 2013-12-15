<?php
/**
 * @package axy\errors
 */

namespace axy\errors;

/**
 * The basic logic-error in the axy hierarchy
 *
 * @author Oleg Grigoreiv <go.vasac@gmail.com>
 */
class Logic extends \LogicException implements Error
{
}
