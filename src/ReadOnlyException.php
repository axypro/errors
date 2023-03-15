<?php

declare(strict_types=1);

namespace axy\errors;

/**
 * Trying to change a readonly value
 *
 * @link https://github.com/axypro/errors/blob/master/doc/errors.md documentation
 */
interface ReadOnlyException extends Forbidden
{
}
