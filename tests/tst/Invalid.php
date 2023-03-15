<?php

declare(strict_types=1);

namespace axy\errors\tests\tst;

use axy\errors\InvalidConfig;
use axy\errors\tests\tst\errors\Pointless;
use axy\errors\tests\tst\errors\Truncated;

class Invalid
{
    /**
     * @var string
     */
    public $file;

    /**
     * @var int
     */
    public $line;

    /**
     * @param bool $inherit
     */
    public function __construct(bool $inherit)
    {
        $this->inherit = $inherit;
    }

    /**
     * @param int $x
     * @throws InvalidConfig
     */
    public function begin(int $x): void
    {
        $this->cont($x, 2);
    }

    /**
     * @throws Pointless
     */
    public function pointless(): void
    {
        $this->file = __FILE__;
        $this->line = __LINE__ + 1;
        throw new Pointless();
    }

    /**
     * @throws Truncated
     */
    public function truncated(): void
    {
        $this->throwTruncated();
    }

    /**
     * @param int $x
     * @param int $y
     * @throws InvalidConfig
     */
    private function cont(int $x, int $y): void
    {
        /** @noinspection PhpMethodParametersCountMismatchInspection */
        $this->finish($x + $y);
    }

    private function throwTruncated(): void
    {
        throw new Truncated('truncated');
    }

    /**
     * @throws InvalidConfig
     */
    private function finish(): void
    {
        $this->file = __FILE__;
        if ($this->inherit) {
            $this->line = __LINE__ + 1;
            throw new errors\InvalidConfig('Config', 'errmsg');
        } else {
            $this->line = __LINE__ + 1;
            throw new InvalidConfig('Config', 'no msg');
        }
    }

    /**
     * @var bool
     */
    private $inherit;
}
