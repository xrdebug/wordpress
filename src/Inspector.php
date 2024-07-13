<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress;

use Chevere\xrDebug\WordPress\Interfaces\InspectorInterface;
use Chevere\xrDebug\WordPress\Interfaces\LoggerInterface;
use Chevere\xrDebug\WordPress\Loggers\ErrorLogger;
use Chevere\xrDebug\WordPress\Loggers\HookLogger;
use Chevere\xrDebug\WordPress\Loggers\MailLogger;
use Chevere\xrDebug\WordPress\Loggers\QueryLogger;

class Inspector implements InspectorInterface
{
    protected static QueryLogger $queryLogger;

    protected static HookLogger $hookLogger;

    protected static ErrorLogger $errorLogger;

    protected static MailLogger $mailLogger;

    public function __construct()
    {
        static::$queryLogger = new QueryLogger();
        static::$hookLogger = new HookLogger();
        static::$errorLogger = new ErrorLogger();
        static::$mailLogger = new MailLogger();
    }

    public function showQueries(bool $flag = true): InspectorInterface
    {
        $this->setLogger(static::$queryLogger, $flag);

        return $this;
    }

    public function showHooks(bool $flag = true): InspectorInterface
    {
        $this->setLogger(static::$hookLogger, $flag);

        return $this;
    }

    public function showErrors(bool $flag = true): InspectorInterface
    {
        $this->setLogger(static::$errorLogger, $flag);

        return $this;
    }

    public function showMails(bool $flag = true): InspectorInterface
    {
        $this->setLogger(static::$mailLogger, $flag);

        return $this;
    }

    private function setLogger(LoggerInterface $logger, bool $flag): void
    {
        if ($flag) {
            $logger->start();

            return;
        }
        $logger->stop();
    }
}
