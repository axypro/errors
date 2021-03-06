<?php
/**
 * Exceptions in PHP
 *
 * @package axy\errors
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 * @license https://raw.github.com/axypro/errors/master/LICENSE MIT
 * @link https://github.com/axypro/errors repository
 * @link https://github.com/axypro/errors/blob/master/README.md documentation
 * @link https://packagist.org/packages/axy/errors composer
 * @uses PHP7.1+
 */

declare(strict_types=1);

namespace axy\errors;

use LogicException;

if (!is_file(__DIR__.'/vendor/autoload.php')) {
    throw new LogicException('Please: composer install');
}

require_once(__DIR__.'/vendor/autoload.php');
