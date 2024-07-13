<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress;

use Chevere\xrDebug\WordPress\Interfaces\InspectorInterface;

class InspectorNull implements InspectorInterface
{
    public function showQueries(bool $flag = true): InspectorInterface
    {
        return $this;
    }

    public function showHooks(bool $flag = true): InspectorInterface
    {
        return $this;
    }

    public function showErrors(bool $flag = true): InspectorInterface
    {
        return $this;
    }

    public function showMails(bool $flag = true): InspectorInterface
    {
        return $this;
    }
}
