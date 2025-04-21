<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;
use Filament\Tables\Table;
use TimoDeWinter\FilamentModifiablePlugins\CustomizableTable;
use TimoDeWinter\FilamentModifiablePlugins\Facades\FilamentModifiablePlugins;

trait CustomizesResourceTable
{
    protected array $columns = [];
    protected array $filters = [];
    protected array $actions = [];
    protected array $bulkActions = [];

    protected array $customTables = [];

    public function columns(array|Closure $columns, string $resource = 'default'): static
    {
        $this->columns[$resource] = $columns;

        return $this;
    }

    public function filters(array|Closure $filters, string $resource = 'default'): static
    {
        $this->filters[$resource] = $filters;

        return $this;
    }

    public function actions(array|Closure $actions, string $resource = 'default'): static
    {
        $this->actions[$resource] = $actions;

        return $this;
    }

    public function bulkActions(array|Closure $bulkActions, string $resource = 'default'): static
    {
        $this->bulkActions[$resource] = $bulkActions;

        return $this;
    }

    public function customTable(Closure $table, string $resource = 'default'): static
    {
        $this->customTables[$resource] = $table;

        return $this;
    }

    public function getColumns(string $resource = 'default'): ?array
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->columns, $resource));
    }

    public function getFilters(string $resource = 'default'): ?array
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->filters, $resource));
    }

    public function getActions(string $resource = 'default'): ?array
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->actions, $resource));
    }

    public function getBulkActions(string $resource = 'default'): ?array
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->bulkActions, $resource));
    }

    public function getCustomTable(Table $table, Closure $defaultTable, string $pluginId, string $resource = 'default'): Table|CustomizableTable
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->customTables, $resource) ?? $defaultTable, [
            'table' => is_null(FilamentModifiablePlugins::getItemOrDefaultItem($this->customTables, $resource))
                ? CustomizableTable::for($table, $pluginId)
                : $table,
        ]);
    }
}
