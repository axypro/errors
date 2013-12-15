<?php
/**
 * Exceptions in PHP
 *
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 * @license https://raw.github.com/axypro/errors/master/LICENSE MIT
 * @uses PHP5.4+
 * @uses axy\backtrace
 */

namespace axy\errors;

if (!\is_file(__DIR__.'/vendor/autoload.php')) {
    throw new \LogicException('Please: ./composer.phar install --dev');
}

require_once(__DIR__.'/vendor/autoload.php');
