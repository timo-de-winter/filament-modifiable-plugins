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
use UnitEnum;

trait CanBeModified
{
    public static function getCluster(): ?string
    {
        return FilamentModifiablePlugins::getCluster(self::class) ?? parent::getCluster();
    }

    public static function getNavigationGroup(): UnitEnum|string|null
    {
        return FilamentModifiablePlugins::getNavigationGroup(self::class) ?? parent::getNavigationGroup();
    }

    public static function getNavigationParentItem(): ?string
    {
        return FilamentModifiablePlugins::getNavigationParentItem(self::class) ?? parent::getNavigationParentItem();
    }

    public static function getNavigationIcon(): string|BackedEnum|null
    {
        return FilamentModifiablePlugins::getNavigationIcon(self::class) ?? parent::getNavigationIcon();
    }

    public static function getActiveNavigationIcon(): string|BackedEnum|null
    {
        return FilamentModifiablePlugins::getActiveNavigationIcon(self::class) ?? parent::getActiveNavigationIcon();
    }

    public static function getLabel(): ?string
    {
        return FilamentModifiablePlugins::getLabel(self::class) ?? parent::getLabel();
    }

    public static function getNavigationSort(): ?int
    {
        return FilamentModifiablePlugins::getNavigationSort(self::class) ?? parent::getNavigationSort();
    }

    public static function getNavigationBadge(): ?string
    {
        return FilamentModifiablePlugins::getNavigationBadge(self::class) ?? parent::getNavigationBadge();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return FilamentModifiablePlugins::getNavigationBadgeColor(self::class) ?? parent::getNavigationBadgeColor();
    }

    public static function getNavigationBadgeTooltip(): Htmlable|string|null
    {
        return FilamentModifiablePlugins::getNavigationBadgeTooltip(self::class) ?? parent::getNavigationBadgeTooltip();
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
