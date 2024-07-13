<?php

declare(strict_types=1);

namespace {
    use Chevere\xrDebug\PHP\Xr;
    use Chevere\xrDebug\PHP\XrInstance;
    use Chevere\xrDebug\WordPress\Inspector;
    use Chevere\xrDebug\WordPress\InspectorInstance;
    use Chevere\xrDebug\WordPress\InspectorNull;
    use Chevere\xrDebug\WordPress\Interfaces\InspectorInterface;
    use function Chevere\xrDebug\PHP\getXrFailover;

    /**
     * Boot xrDebug WordPress based on `WP_ENVIRONMENT_TYPE` environment.
     * If `WP_ENVIRONMENT_TYPE` is `production`, xrDebug will be disabled.
     *
     * @codeCoverageIgnore
     */
    if (! function_exists('wp_boot_xr')) { // @codeCoverageIgnore
        function wp_boot_xr(): void
        {
            if (defined('WP_ENVIRONMENT_TYPE')
                && wp_get_environment_type() === 'production'
            ) {
                new InspectorInstance(
                    new InspectorNull()
                );
                new XrInstance(
                    new Xr(isEnabled: false)
                );

                return;
            }
            wp_xri();
        }
    }

    if (! function_exists('wp_xri')) { // @codeCoverageIgnore
        /**
         * Access xrDebug WordPress inspector to send debug information.
         *
         * @codeCoverageIgnore
         */
        function wp_xri(): InspectorInterface
        {
            $xr = getXrFailover();
            if ($xr === null) {
                return new InspectorNull();
            }

            try {
                return InspectorInstance::get();
            } catch (LogicException) {
                $xrInspector = $xr->isEnabled()
                    ? new Inspector()
                    : new InspectorNull();

                return (new InspectorInstance($xrInspector))::get();
            }
        }
    }
}
