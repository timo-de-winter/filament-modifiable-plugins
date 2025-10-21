<?php

namespace TimoDeWinter\FilamentModifiablePlugins;

use Filament\Tables\Table;

class CustomizableTable extends Table
{
    private string $resource;

    public static function for(Table $table, string $resource): static
    {
        $static = app(static::class, ['livewire' => $table->getLivewire()]);
        $static->configure();

        return $static
            ->forResource($resource)
            ->query($table->getQuery());
    }

    public function forResource(string $resource): static
    {
        $this->resource = $resource;

        return $this;
    }

    public function defaultColumns(array $defaults): static
    {
        $this->columns(FilamentModifiablePlugins::getColumns($this->resource) ?? $defaults);

        return $this;
    }

    public function defaultFilters(array $defaults): static
    {
        $this->filters(FilamentModifiablePlugins::getFilters($this->resource) ?? $defaults);

        return $this;
    }

    public function defaultRecordActions(array $defaults): static
    {
        $this->recordActions(FilamentModifiablePlugins::getRecordActions($this->resource) ?? $defaults);

        return $this;
    }

    public function defaultToolbarActions(array $defaults): static
    {
        $this->toolbarActions(FilamentModifiablePlugins::getToolbarActions($this->resource) ?? $defaults);

        return $this;
    }
}
