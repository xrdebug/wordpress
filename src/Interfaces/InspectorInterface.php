<?php

declare(strict_types=1);

namespace Chevere\xrDebug\WordPress\Interfaces;

interface InspectorInterface
{
    public function showQueries(bool $flag = true): self;

    public function showHooks(bool $flag = true): self;

    public function showErrors(bool $flag = true): self;

    public function showMails(bool $flag = true): self;
}
