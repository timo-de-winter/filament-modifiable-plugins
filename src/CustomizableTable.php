<?php

namespace TimoDeWinter\FilamentModifiablePlugins;

use Filament\Tables\Table;
use TimoDeWinter\FilamentModifiablePlugins\Facades\FilamentModifiablePlugins as FilamentModifiablePluginsFacade;

class CustomizableTable extends Table
{
    private string $resource;

    private Table $table;

    public static function for(Table $table, string $resource): static
    {
        $static = app(static::class, ['livewire' => $table->getLivewire()]);
        $static->configure();

        return $static
            ->forResource($resource)
            ->forTable($table);
    }

    public function forResource(string $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    public function forTable(Table $table): static
    {
        $this->table = $table;

        return $this;
    }

    public function defaultColumns(array $defaults): static
    {
        $this->table->columns(FilamentModifiablePluginsFacade::getColumns($this->resource) ?? $defaults);

        return $this;
    }

    public function defaultFilters(array $defaults): static
    {
        $this->table->filters(FilamentModifiablePluginsFacade::getFilters($this->resource) ?? $defaults);

        return $this;
    }

    public function defaultRecordActions(array $defaults): static
    {
        $this->table->recordActions(FilamentModifiablePluginsFacade::getRecordActions($this->resource) ?? $defaults);

        return $this;
    }

    public function defaultToolbarActions(array $defaults): static
    {
        $this->table->toolbarActions(FilamentModifiablePluginsFacade::getToolbarActions($this->resource) ?? $defaults);

        return $this;
    }
}
