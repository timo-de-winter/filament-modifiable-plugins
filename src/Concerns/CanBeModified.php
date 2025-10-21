<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns;

use BackedEnum;
use Closure;
use Filament\Facades\Filament;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use TimoDeWinter\FilamentModifiablePlugins\CustomizableTable;
use TimoDeWinter\FilamentModifiablePlugins\Facades\FilamentModifiablePlugins;

trait CanBeModified
{
    public static function getCluster(): ?string
    {
        return FilamentModifiablePlugins::getCluster(self::class) ?? parent::getCluster();
    }

    public static function getNavigationGroup(string $resource): ?string
    {
        return FilamentModifiablePlugins::getNavigationGroup($resource) ?? parent::getNavigationGroup();
    }

    public static function getNavigationParentItem(string $resource): ?string
    {
        return FilamentModifiablePlugins::getNavigationParentItem($resource) ?? parent::getNavigationParentItem();
    }

    public static function getNavigationIcon(string $resource): string|BackedEnum|null
    {
        return FilamentModifiablePlugins::getNavigationIcon($resource) ?? parent::getNavigationIcon();
    }

    public static function getActiveNavigationIcon(string $resource): string|BackedEnum|null
    {
        return FilamentModifiablePlugins::getActiveNavigationIcon($resource) ?? parent::getActiveNavigationIcon();
    }

    public static function getLabel(string $resource): ?string
    {
        return FilamentModifiablePlugins::getLabel($resource) ?? parent::getLabel();
    }

    public static function getNavigationSort(string $resource): ?int
    {
        return FilamentModifiablePlugins::getNavigationSort($resource) ?? parent::getNavigationSort();
    }

    public static function getNavigationBadge(string $resource): ?string
    {
        return FilamentModifiablePlugins::getNavigationBadge($resource) ?? parent::getNavigationBadge();
    }

    public static function getNavigationBadgeColor(string $resource): ?string
    {
        return FilamentModifiablePlugins::getNavigationBadgeColor($resource) ?? parent::getNavigationBadgeColor();
    }

    public static function getNavigationBadgeTooltip(string $resource): Htmlable|string|null
    {
        return FilamentModifiablePlugins::getNavigationBadgeTooltip($resource) ?? parent::getNavigationBadgeTooltip();
    }

    public static function getCustomRelations(array $defaultRelations = []): array
    {
        if (! Filament::getCurrentPanel()) {
            return $defaultRelations;
        }

        return FilamentModifiablePlugins::getCustomRelations(self::class) ?? $defaultRelations;
    }

    public static function getCustomPages(array $defaultPages = []): array
    {
        if (! Filament::getCurrentPanel()) {
            return $defaultPages;
        }

        return FilamentModifiablePlugins::getCustomPages(self::class) ?? $defaultPages;
    }

    public static function getCustomSchema(Schema $schema, Closure $defaultSchema): Schema
    {
        return FilamentModifiablePlugins::getSchema($schema, $defaultSchema, self::class);
    }

    public static function getCustomTable(Table $table, Closure $defaultTable): CustomizableTable|Table
    {
        return FilamentModifiablePlugins::getCustomTable($table, $defaultTable, self::class);
    }
}
