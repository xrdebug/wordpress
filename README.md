# xrDebug WordPress Plugin

> 🔔 Subscribe to the [newsletter](https://chv.to/chevere-newsletter) to don't miss any update regarding Chevere.

<a href="https://xrdebug.com"><img alt="xrDebug" src="xr.svg" width="40%"></a>

[![Build](https://img.shields.io/github/actions/workflow/status/xrdebug/wordpress/deploy-for-wordpress.yml?style=flat-square)](https://github.com/xrdebug/xrdebug/actions)
![Code size](https://img.shields.io/github/languages/code-size/xrdebug/wordpress?style=flat-square)
[![MIT](https://img.shields.io/github/license/xrdebug/wordpress?style=flat-square&1721160499522)](LICENSE)
[![PHPStan](https://img.shields.io/badge/PHPStan-level%209-blueviolet?style=flat-square)](https://phpstan.org/)

## Summary

WordPress plugin for debugging with [xrDebug](https://xrdebug.com). This plugin uses the [xrDebug PHP library](https://github.com/xrdebug/php) and it adds WordPress-specific features.

## Installation

1. Go to [latest release](https://github.com/xrdebug/wordpress/releases/latest) and download `xrdebug.zip`.
2. Go to your WordPress admin panel, click on `Plugins` and then `Add New`.
3. Click on `Upload Plugin` and select the downloaded zip file.
4. Click on `Install Now` and then `Activate`.

## Debug Helpers

In addition to the [PHP xrDebug helpers](https://github.com/xrdebug/php?tab=readme-ov-file#debug-helpers) this plugin adds the following WordPress-specific debug helpers.

### wp_xri

Use function `wp_xri` to access the xrDebug WordPress inspector instance, which can be used to control the WordPress inspector logging features.

| Method                      | Toggles         |
| --------------------------- | --------------- |
| [showErrors](#showerrors)   | Showing errors  |
| [showHooks](#showhooks)     | Showing hooks   |
| [showMails](#showmails)     | Showing emails  |
| [showQueries](#showqueries) | Showing queries |

#### showErrors

Use method `showErrors` to show the PHP errors during the WordPress request.

```php
wp_xri()->showErrors();
```

To stop showing errors pass `FALSE` as argument.

```php
wp_xri()->showErrors(FALSE);
```

#### showHooks

Use method `showHooks` to show the WordPress hooks executed during the WordPress request.

```php
wp_xri()->showHooks();
```

To stop showing hooks pass `FALSE` as argument.

```php
wp_xri()->showHooks(FALSE);
```

#### showMails

Use method `showMails` to show the emails sent during the WordPress request.

```php
wp_xri()->showMails();
```

To stop showing emails pass `FALSE` as argument.

```php
wp_xri()->showMails(FALSE);
```

#### showQueries

Use method `showQueries` to show the SQL queries executed during the WordPress request.

```php
wp_xri()->showQueries();
```

To stop showing queries pass `FALSE` as argument.

```php
wp_xri()->showQueries(FALSE);
```

## License

Copyright [Rodolfo Berrios A.](https://rodolfoberrios.com/)

This software is licensed under the MIT License. See [LICENSE](LICENSE) for the full license text.
