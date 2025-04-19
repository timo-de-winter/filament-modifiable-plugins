# A helper package for when creating packages that provide filament resources.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/timo-de-winter/filament-modifiable-plugins.svg?style=flat-square)](https://packagist.org/packages/timo-de-winter/filament-modifiable-plugins)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/timo-de-winter/filament-modifiable-plugins/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/timo-de-winter/filament-modifiable-plugins/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/timo-de-winter/filament-modifiable-plugins/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/timo-de-winter/filament-modifiable-plugins/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/timo-de-winter/filament-modifiable-plugins.svg?style=flat-square)](https://packagist.org/packages/timo-de-winter/filament-modifiable-plugins)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.
## Installation

You can install the package via composer:
```bash
composer require timo-de-winter/filament-modifiable-plugins
```

## Usage
You should add the CanModifyPage trait to your plugin class.

```php
use CanModifyPage;
```

Add the following trait to your resources:
```php
use CanBeModified;
```

When implementing the plugin you can customize how it is used:
```php
AwesomePlugin::make()
    ->navigationSort(1)
    ->cluster(CoolCluster::class, AwesomeResource::class);
```
There are many more customizations possible.

## Testing
```bash
composer test
```

## Changelog
Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Security Vulnerabilities
Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits
- [Timo de Winter](https://github.com/timo-de-winter)
- [All Contributors](../../contributors)

## License
The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
