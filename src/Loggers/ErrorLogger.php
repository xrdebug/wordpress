<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress\Loggers;

use Chevere\xrDebug\WordPress\Interfaces\LoggerInterface;

class ErrorLogger implements LoggerInterface
{
    protected bool $active = false;

    public function start(): void
    {
        if ($this->active) {
            return;
        }
        add_action('wp_error_added', [$this, 'sendErrorToXrDebug'], 4, 4);
        $this->active = true;
    }

    public function stop(): void
    {
        if (! $this->active) {
            return;
        }
        remove_action('wp_error_added', [$this, 'sendErrorToXrDebug'], 4);
        $this->active = false;
    }

    public function sendErrorToXrDebug(string|int $error, string $message, mixed $data, object $wpError): void
    {
        xr(
            error: $error,
            message: $message,
            WP_Error: $wpError,
            f: XR_BACKTRACE
        );
    }
}
