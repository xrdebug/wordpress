<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress\Loggers;

use Chevere\xrDebug\WordPress\Interfaces\LoggerInterface;
use Doctrine\SqlFormatter\SqlFormatter;

class QueryLogger implements LoggerInterface
{
    protected bool $active = false;

    public function start(): void
    {
        if ($this->active) {
            return;
        }
        if (! defined('SAVEQUERIES') || ! SAVEQUERIES) {
            define('SAVEQUERIES', true);
        }
        add_filter('log_query_custom_data', [$this, 'sendQueryToXrDebug'], 1, 3);
        $this->active = true;
    }

    public function stop(): void
    {
        if (! $this->active) {
            return;
        }
        remove_filter('log_query_custom_data', [$this, 'sendQueryToXrDebug'], 1);
        $this->active = false;
    }

    /**
     * @param array<mixed> $query_data
     * @return array<mixed>
     */
    public function sendQueryToXrDebug(array $query_data, string $query, float $query_time): array
    {
        $timeInMilliSeconds = $query_time * 1000;
        $query = '# time '
            . $timeInMilliSeconds
            . 'ms'
            . PHP_EOL
            . $query;
        xrr(
            (new SqlFormatter())->format($query)
        );

        return $query_data;
    }
}
