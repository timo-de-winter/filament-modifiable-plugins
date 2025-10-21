<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns;

use BackedEnum;
use Closure;
use Illuminate\Contracts\Support\Htmlable;
use TimoDeWinter\FilamentModifiablePlugins\Facades\FilamentModifiablePlugins;
use UnitEnum;

trait CanModifyResources
{
    public function title(string | Htmlable | Closure $title, string $resource): static
    {
        FilamentModifiablePlugins::title($title, $resource);

        return $this;
    }

    public function slug(string | Closure $slug, string $resource): static
    {
        FilamentModifiablePlugins::slug($slug, $resource);

        return $this;
    }

    public function tenantOwnershipRelationshipName(null|string|Closure $tenantOwnershipRelationshipName, string $resource): static
    {
        FilamentModifiablePlugins::tenantOwnershipRelationshipName($tenantOwnershipRelationshipName, $resource);

        return $this;
    }

    public function customRelations(array|Closure $relations, string $resource): static
    {
        FilamentModifiablePlugins::customRelations($relations, $resource);

        return $this;
    }

    public function customPages(array|Closure $pages, string $resource): static
    {
        FilamentModifiablePlugins::customPages($pages, $resource);

        return $this;
    }

    public function schema(Closure $schema, string $resource): static
    {
        FilamentModifiablePlugins::schema($schema, $resource);

        return $this;
    }

    public function cluster(null|string|Closure $cluster, string $resource): static
    {
        FilamentModifiablePlugins::cluster($cluster, $resource);

        return $this;
    }

    public function navigationGroup(string | UnitEnum | Closure | null $group, string $resource): static
    {
        FilamentModifiablePlugins::navigationGroup($group, $resource);

        return $this;
    }

    public function parentItem(string | Closure | null $group, string $resource): static
    {
        FilamentModifiablePlugins::parentItem($group, $resource);

        return $this;
    }

    public function icon(string | BackedEnum | Htmlable | Closure | null $icon, string $resource): static
    {
        FilamentModifiablePlugins::icon($icon, $resource);

        return $this;
    }

    public function activeIcon(string | BackedEnum | Htmlable | Closure | null $activeIcon, string $resource): static
    {
        FilamentModifiablePlugins::activeIcon($activeIcon, $resource);

        return $this;
    }

    public function label(string | Closure $label, string $resource): static
    {
        FilamentModifiablePlugins::label($label, $resource);

        return $this;
    }

    public function sort(int | Closure | null $sort, string $resource): static
    {
        FilamentModifiablePlugins::sort($sort, $resource);

        return $this;
    }

    public function badge(string | Closure | null $badge, string $resource): static
    {
        FilamentModifiablePlugins::badge($badge, $resource);

        return $this;
    }

    public function badgeColor(string | array | Closure | null $badgeColor, string $resource): static
    {
        FilamentModifiablePlugins::badgeColor($badgeColor, $resource);

        return $this;
    }

    public function badgeTooltip(string | Htmlable | Closure | null $badgeTooltip, string $resource): static
    {
        FilamentModifiablePlugins::badgeTooltip($badgeTooltip, $resource);

        return $this;
    }

    public function columns(array|Closure $columns, string $resource): static
    {
        FilamentModifiablePlugins::columns($columns, $resource);

        return $this;
    }

    public function filters(array|Closure $filters, string $resource): static
    {
        FilamentModifiablePlugins::filters($filters, $resource);

        return $this;
    }

    public function recordActions(array|Closure $actions, string $resource): static
    {
        FilamentModifiablePlugins::recordActions($actions, $resource);

        return $this;
    }

    public function toolbarActions(array|Closure $toolbarActions, string $resource): static
    {
        FilamentModifiablePlugins::toolbarActions($toolbarActions, $resource);

        return $this;
    }

    public function customTable(Closure $table, string $resource): static
    {
        FilamentModifiablePlugins::customTable($table, $resource);

        return $this;
    }
}
