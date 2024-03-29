<?php

declare(strict_types=1);

namespace axy\errors;

use Exception;

/**
 * This container is read-only
 *
 * @link https://github.com/axypro/errors/blob/master/doc/classes/ContainerReadOnly.md documentation
 */
class ContainerReadOnly extends Logic implements ReadOnlyException
{
    /**
     * {@inheritdoc}
     */
    protected $defaultMessage = '{{ container }} is read-only';

    /**
     * Constructor
     *
     * @param object|string $container [optional]
     *        the container or its name
     * @param Exception $previous [optional]
     * @param mixed $thrower [optional]
     */
    public function __construct($container = null, Exception $previous = null, $thrower = null)
    {
        $this->container = $container;
        $message = [
            'container' => $container,
        ];
        parent::__construct($message, 0, $previous, $thrower);
    }

    /**
     * @return object|string
     */
    final public function getContainer()
    {
        return $this->container;
    }

    /**
     * @var mixed
     */
    protected $container;
}
