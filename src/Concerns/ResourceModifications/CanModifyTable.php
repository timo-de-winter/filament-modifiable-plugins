<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns\ResourceModifications;

use Closure;
use Filament\Tables\Table;
use TimoDeWinter\FilamentModifiablePlugins\CustomizableTable;

trait CanModifyTable
{
    protected array $columns = [];

    protected array $filters = [];

    protected array $recordActions = [];

    protected array $toolbarActions = [];

    protected array $customTables = [];

    /**
     * Setters
     */
    public function columns(array|Closure $columns, string $resource): static
    {
        $this->columns[$resource] = $columns;

        return $this;
    }

    public function filters(array|Closure $filters, string $resource): static
    {
        $this->filters[$resource] = $filters;

        return $this;
    }

    public function recordActions(array|Closure $actions, string $resource): static
    {
        $this->recordActions[$resource] = $actions;

        return $this;
    }

    public function toolbarActions(array|Closure $toolbarActions, string $resource): static
    {
        $this->toolbarActions[$resource] = $toolbarActions;

        return $this;
    }

    public function customTable(Closure $table, string $resource): static
    {
        $this->customTables[$resource] = $table;

        return $this;
    }

    /**
     * Getters
     */
    public function getColumns(string $resource): ?string
    {
        return $this->evaluate($this->columns[$resource] ?? null);
    }

    public function getFilters(string $resource): ?string
    {
        return $this->evaluate($this->filters[$resource] ?? null);
    }

    public function getRecordActions(string $resource): ?string
    {
        return $this->evaluate($this->recordActions[$resource] ?? null);
    }

    public function getToolbarActions(string $resource): ?string
    {
        return $this->evaluate($this->toolbarActions[$resource] ?? null);
    }

    public function getCustomTable(Table $table, Closure $defaultTable, string $resource): ?CustomizableTable
    {
        return $this->evaluate($this->customTables[$resource] ?? $defaultTable, [
            'table' => CustomizableTable::for($table, $resource),
        ]);
    }
}
