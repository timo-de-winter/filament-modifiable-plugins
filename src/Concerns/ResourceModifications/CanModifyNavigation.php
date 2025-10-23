<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns\ResourceModifications;

use BackedEnum;
use Closure;
use Illuminate\Contracts\Support\Htmlable;
use UnitEnum;

trait CanModifyNavigation
{
    protected array $navigationGroups = [];

    protected array $navigationParentItems = [];

    protected array $navigationIcons = [];

    protected array $activeNavigationIcons = [];

    protected array $navigationLabels = [];

    protected array $navigationSorts = [];

    protected array $navigationBadges = [];

    protected array $navigationBadgeTooltips = [];

    protected array $navigationBadgeColors = [];

    /**
     * Setters
     */
    public function navigationGroup(string|UnitEnum|Closure|null $group, string $resource): static
    {
        $this->navigationGroups[$resource] = $group;

        return $this;
    }

    public function parentItem(string|Closure|null $group, string $resource): static
    {
        $this->navigationParentItems[$resource] = $group;

        return $this;
    }

    public function icon(string|BackedEnum|Htmlable|Closure|null $icon, string $resource): static
    {
        $this->navigationIcons[$resource] = $icon;

        return $this;
    }

    public function activeIcon(string|BackedEnum|Htmlable|Closure|null $activeIcon, string $resource): static
    {
        $this->activeNavigationIcons[$resource] = $activeIcon;

        return $this;
    }

    public function label(string|Closure $label, string $resource): static
    {
        $this->navigationLabels[$resource] = $label;

        return $this;
    }

    public function sort(int|Closure|null $sort, string $resource): static
    {
        $this->navigationSorts[$resource] = $sort;

        return $this;
    }

    public function badge(string|Closure|null $badge, string $resource): static
    {
        $this->navigationBadges[$resource] = $badge;

        return $this;
    }

    public function badgeColor(string|array|Closure|null $badgeColor, string $resource): static
    {
        $this->navigationBadgeColors[$resource] = $badgeColor;

        return $this;
    }

    public function badgeTooltip(string|Htmlable|Closure|null $badgeTooltip, string $resource): static
    {
        $this->navigationBadgeTooltips[$resource] = $badgeTooltip;

        return $this;
    }

    /**
     * Getters
     */
    public function getNavigationGroup(string $resource): ?string
    {
        return $this->evaluate($this->navigationGroups[$resource] ?? null);
    }

    public function getNavigationParentItem(string $resource): ?string
    {
        return $this->evaluate($this->navigationParentItems[$resource] ?? null);
    }

    public function getNavigationIcon(string $resource): string|BackedEnum|null
    {
        return $this->evaluate($this->navigationIcons[$resource] ?? null);
    }

    public function getActiveNavigationIcon(string $resource): string|BackedEnum|null
    {
        return $this->evaluate($this->activeNavigationIcons[$resource] ?? null);
    }

    public function getLabel(string $resource): ?string
    {
        return $this->evaluate($this->navigationLabels[$resource] ?? null);
    }

    public function getNavigationSort(string $resource): ?int
    {
        return $this->evaluate($this->navigationSorts[$resource] ?? null);
    }

    public function getNavigationBadge(string $resource): ?string
    {
        return $this->evaluate($this->navigationBadges[$resource] ?? null);
    }

    public function getNavigationBadgeColor(string $resource): ?string
    {
        return $this->evaluate($this->navigationBadgeColors[$resource] ?? null);
    }

    public function getNavigationBadgeTooltip(string $resource): Htmlable|string|null
    {
        return $this->evaluate($this->navigationBadgeTooltips[$resource] ?? null);
    }
}
