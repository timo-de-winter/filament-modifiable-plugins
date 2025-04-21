<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns;

use Closure;
use Filament\Facades\Filament;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;
use TimoDeWinter\FilamentModifiablePlugins\CustomizableTable;
use TimoDeWinter\FilamentModifiablePlugins\Facades\FilamentModifiablePlugins;

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

    public static function getCustomForm(Form $form, Closure $defaultForm): Form
    {
        return filament(self::getPluginId())->getForm($form, $defaultForm, self::class);
    }

    public static function getCustomTable(Table $table, Closure $defaultTable): CustomizableTable|Table
    {
        return filament(self::getPluginId())->getCustomTable($table, $defaultTable, self::getPluginId(), self::class);
    }

    public static function getCustomRelations(array $defaultRelations = []): array
    {
        if (! Filament::getCurrentPanel()) {
            return $defaultRelations;
        }

        return filament(self::getPluginId())->getCustomRelations(self::class) ?? $defaultRelations;
    }

    public static function getCustomPages(array $defaultPages = []): array
    {
        if (! Filament::getCurrentPanel()) {
            return $defaultPages;
        }

        return filament(self::getPluginId())->getCustomPages(self::class) ?? $defaultPages;
    }
}
