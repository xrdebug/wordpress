<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress\Interfaces;

interface LoggerInterface
{
    public function start(): void;

    public function stop(): void;
}
