=== xrDebug ===
Contributors: rodber
Donate link: https://github.com/sponsors/rodber
Tags: development, debugging, debug, developer
Requires PHP: 8.1
Requires at least: 5.9
Tested up to: 6.6
Stable tag: 1.0.0
License: MIT

Debug WordPress with xrDebug.

== Description ==

[xrDebug](https://xrdebug.com) is an Open Source lightweight debug utility.

After installing this plugin, you can use the `xr()` function to quickly dump stuff. It provides several [debug helpers](https://github.com/xrdebug/php?tab=readme-ov-file#debug-helpers) and also the `wp_xri()` inspector function which you can use to retrieve WordPress context-aware information.

Here some examples:

`
xr('Hello world');

xr(['a' => 1, 'b' => 2], e: '🔴');

xr('multiple', 'arguments', 'are', 'welcome');

xri()->pause();

wp_xri()->showQueries();
`

Note: To debug using this plugin make sure to set `WP_ENVIRONMENT_TYPE` to a value different than `production`.

`
define( 'WP_ENVIRONMENT_TYPE', 'local' );
`

== Full Documentation ==

Documentation can be found at [xrdebug/wordpress](https://github.com/xrdebug/wordpress). Framework agnostic PHP documentation is available at [xrdebug/php](https://github.com/xrdebug/php).

== Changelog ==

You can find the [changelog at GitHub](https://github.com/xrdebug/wordpress/releases).

== Upgrade Notice ==

You can find the [changelog at GitHub](https://github.com/xrdebug/wordpress/releases).

== Screenshots ==

1. Here's how the xrDebug web app looks like.
2. Dump display powered by Chevere's VarDump.
3. Error log in auto dark mode.

== Frequently Asked Questions ==

Want to know how to get started? Check the [documentation](https://docs.xrdebug.com).
