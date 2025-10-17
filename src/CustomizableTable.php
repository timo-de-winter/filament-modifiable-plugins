<?php

namespace TimoDeWinter\FilamentModifiablePlugins;

use Filament\Tables\Table;

class CustomizableTable extends Table
{
    public string $pluginId;

    public static function for(Table $table, string $pluginId)
    {
        $static = app(static::class, ['livewire' => $table->getLivewire()]);
        $static->configure();

        return $static
            ->query($table->getQuery())
            ->setPluginId($pluginId);
    }

    public function setPluginId(string $pluginId): static
    {
        $this->pluginId = $pluginId;

        return $this;
    }

    public function defaultColumns(array $defaults): static
    {
        $this->columns(filament($this->pluginId)->getColumns() ?? $defaults);

        return $this;
    }

    public function defaultFilters(array $defaults): static
    {
        $this->filters(filament($this->pluginId)->getFilters() ?? $defaults);

        return $this;
    }

    public function defaultActions(array $defaults): static
    {
        $this->recordActions(filament($this->pluginId)->getRecordActions() ?? $defaults);

        return $this;
    }

    public function defaultBulkActions(array $defaults): static
    {
        $this->toolbarActions(filament($this->pluginId)->getToolbarActions() ?? $defaults);

        return $this;
    }
}
