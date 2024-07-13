<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress\Loggers;

use Chevere\xrDebug\WordPress\Interfaces\LoggerInterface;

class HookLogger implements LoggerInterface
{
    protected bool $active = false;

    public function start(): void
    {
        if ($this->active) {
            return;
        }
        add_action('all', [$this, 'sendHookToXrDebug'], 1, 20);
        $this->active = true;
    }

    public function stop(): void
    {
        if (! $this->active) {
            return;
        }
        remove_action('all', [$this, 'sendHookToXrDebug'], 1);
        $this->active = false;
    }

    public function sendHookToXrDebug(string $name, mixed ...$arguments): void
    {
        xr(
            hook_name: $name,
            hook_args: $arguments
        );
    }
}
