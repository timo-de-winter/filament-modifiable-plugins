<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \TimoDeWinter\FilamentModifiablePlugins\FilamentModifiablePlugins
 */
class FilamentModifiablePlugins extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \TimoDeWinter\FilamentModifiablePlugins\FilamentModifiablePlugins::class;
    }
}
