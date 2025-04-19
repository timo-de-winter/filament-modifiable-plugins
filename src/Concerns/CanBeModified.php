<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns;

use TimoDeWinter\FilamentModifiablePlugins\Facades\FilamentModifiablePlugins;
use Illuminate\Contracts\Support\Htmlable;

trait CanBeModified
{
    abstract public static function getPluginId(): string;

    public static function getNavigationGroup(): ?string
    {
        return filament(self::getPluginId())->getNavigationGroup(self::class) ?? parent::getNavigationGroup();
    }

    public static function getNavigationSort(): ?int
    {
        return filament(self::getPluginId())->getNavigationSort(self::class) ?? parent::getNavigationSort();
    }

    public static function getNavigationLabel(): string
    {
        return filament(self::getPluginId())->getNavigationLabel(self::class) ?? parent::getNavigationLabel();
    }

    public static function getNavigationIcon(): string|Htmlable|null
    {
        return filament(self::getPluginId())->getNavigationIcon(self::class) ?? parent::getNavigationIcon();
    }

    public static function getActiveNavigationIcon(): string|Htmlable|null
    {
        return filament(self::getPluginId())->getActiveNavigationIcon(self::class) ?? parent::getActiveNavigationIcon();
    }

    public function getTitle(): string|Htmlable
    {
        return filament(self::getPluginId())->getPageTitle(self::class) ?? parent::getTitle();
    }

    public static function getSlug(): string
    {
        return filament(self::getPluginId())->getSlug(self::class) ?? parent::getSlug();
    }

    public static function getCluster(): ?string
    {
        return FilamentModifiablePlugins::getCluster(self::class) ?? parent::getCluster();
    }
}
