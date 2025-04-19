<?php

namespace TimoDeWinter\FilamentModifiablePlugins;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentModifiablePluginsServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-modifiable-plugins');
    }
}
