<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress;

use Chevere\xrDebug\WordPress\Interfaces\InspectorInterface;
use LogicException;

/**
 * @codeCoverageIgnore
 */
final class InspectorInstance
{
    private static InspectorInterface $instance;

    public function __construct(InspectorInterface $inspector)
    {
        self::$instance = $inspector;
    }

    public static function get(): InspectorInterface
    {
        return self::$instance
            ?? throw new LogicException();
    }
}
