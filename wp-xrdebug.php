<?php

declare(strict_types=1);

/**
 * Plugin Name: xrDebug
 * Plugin URI: https://github.com/xrdebug/wordpress
 * Description: Debug WordPress with xrDebug
 * Version: 1.0.0
 * Requires PHP: 8.1
 * Tested up to: 6.6
 * Author: xrDebug
 * Author URI: https://xrdebug.com
 * License: Apache-2.0
 */

use Chevere\xrDebug\PHP\Xr;

if (! class_exists(Xr::class)) {
    if (is_file(__DIR__ . '/vendor/autoload_packages.php')) {
        require_once __DIR__ . '/vendor/autoload_packages.php';
    }
}
wp_boot_xr();
