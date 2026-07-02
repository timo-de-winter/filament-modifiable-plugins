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

    public function packageRegistered(): void
    {
        // The manager must be a container singleton: its facade accessor is the
        // bare class name, and without a shared binding the instance configured
        // during provider/panel boot lives only in the facade's resolved-instance
        // cache, which Octane clears before every request — losing all resource
        // modifications registered at boot.
        $this->app->singleton(FilamentModifiablePlugins::class);
    }
}
