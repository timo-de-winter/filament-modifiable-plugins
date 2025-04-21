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
This is an example of a plugin that may be installed that allows resources to be customized:

```php
public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            UserManagementPlugin::make()
                ->navigationGroup('Settings')
                ->navigationSort(2)
                ->navigationLabel('System users')
                ->navigationIcon('heroicon-o-users')
                ->activeNavigationIcon('heroicon-m-users')
                ->pageTitle('Your users')
                ->slug('cool-users')
                ->cluster(Settings::class)
        ]);
}
```

### Custom form & tables
Most packages that make use of customizable resources will allow you to use custom forms and tables
```php
public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            UserManagementPlugin::make()
                ->form(function (Form $form) {
                    return $form->schema([
                        TextInput::make('name'),
                    ]);
                })
                // You can customize the table functions like so
                ->columns([])
                ->filters([])
                ->actions([])
                ->bulkActions([])
                // Or just override the full table like so:
                ->customTable(function (\Filament\Tables\Table $table) {
                    return $table
                        ->columns();
                })
        ]);
}
```

### Multiple resources
When a package ships with multiple resources you can use the functions to target specific resources.
When leaving the specific resource out, you will target all resources that have no specific customizer set.

```php
public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            UserManagementPlugin::make()
                ->navigationGroup('Settings', UserResource::class)
                ->form(function (Form $form) {
                    return $form->schema([
                        TextInput::make('name'),
                    ]);
                }, UserResource::class),
        ]);
}
```

### Creating a customizable resource
When you are writing a plugin that provides one or more resources you might want to implement customizable resources as well.
Below you can find an explanation of how to create a customizable resource.

First you should add the following trait to the resource.
```php
use \BeInteractive\BeFilamentCore\Modules\CustomizableResources\Traits\InteractsWithCustomizableResource;
```

To make sure that your form can be customized implement it like this:
```php
public static function form(Form $form): Form
{
    return self::getCustomForm($form, function (Form $form) {
        return $form
            ->schema([
                // your default form schema
            ]);
    });
}
```

Now to make your table customizable you implement the `CustomizableTable` class to make customization easier.
```php
public static function table(Table $table): Table
{
    return self::getCustomTable($table, function (CustomizableTable $table) {
        return $table
            ->defaultColumns([
                // Your default default columns
            ])
            ->defaultFilters([
                // Your default default filters
            ])
            ->defaultActions([
                // Your default default actions
            ])
            ->defaultBulkActions([
                // Your default default bulk actions
            ]);
    });
}
```

Implement custom relations like this:
```php
public static function getRelations(): array
{
    return self::getCustomRelations([
        // Your default relations
    ]);
}
```

Implement custom pages like this:
```php
public static function getPages(): array
{
    return self::getCustomPages([
        // Your default pages
    ]);
}
```

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
