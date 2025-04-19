<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns;

use Closure;
use TimoDeWinter\FilamentModifiablePlugins\Facades\FilamentModifiablePlugins;
use Filament\Support\Concerns\EvaluatesClosures;

trait CanModifyPage
{
    use EvaluatesClosures;

    protected array $navigationGroups = [];

    protected array $navigationSorts = [];

    protected array $navigationLabels = [];

    protected array $navigationIcons = [];

    protected array $activeNavigationIcons = [];

    protected array $pageTitles = [];

    protected array $slugs = [];

    public function navigationGroup(string|Closure $group, string $resource = 'default'): static
    {
        $this->navigationGroups[$resource] = $group;

        return $this;
    }

    public function navigationSort(int|Closure $sort, string $resource = 'default'): static
    {
        $this->navigationSorts[$resource] = $sort;

        return $this;
    }

    public function navigationLabel(string|Closure $label, string $resource = 'default'): static
    {
        $this->navigationLabels[$resource] = $label;

        return $this;
    }

    public function navigationIcon(string|Closure $icon, string $resource = 'default'): static
    {
        $this->navigationIcons[$resource] = $icon;

        return $this;
    }

    public function activeNavigationIcon(string|Closure $icon, string $resource = 'default'): static
    {
        $this->activeNavigationIcons[$resource] = $icon;

        return $this;
    }

    public function pageTitle(string|Closure $pageTitle, string $resource = 'default'): static
    {
        $this->pageTitles[$resource] = $pageTitle;

        return $this;
    }

    public function slug(string|Closure $slug, string $resource = 'default'): static
    {
        $this->slugs[$resource] = $slug;

        return $this;
    }

    public function cluster(string|Closure $cluster, string $resource = 'default'): static
    {
        FilamentModifiablePlugins::cluster($cluster, $resource);

        return $this;
    }

    public function getNavigationGroup(string $resource = 'default'): Closure|string|null
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->navigationGroups, $resource));
    }

    public function getNavigationSort(string $resource = 'default'): int|Closure|null
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->navigationSorts, $resource));
    }

    public function getNavigationLabel(string $resource = 'default'): Closure|string|null
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->navigationLabels, $resource));
    }

    public function getNavigationIcon(string $resource = 'default'): Closure|string|null
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->navigationIcons, $resource));
    }

    public function getActiveNavigationIcon(string $resource = 'default'): Closure|string|null
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->activeNavigationIcons, $resource));
    }

    public function getPageTitle(string $resource = 'default'): Closure|string|null
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->pageTitles, $resource));
    }

    public function getSlug(string $resource = 'default'): Closure|string|null
    {
        return $this->evaluate(FilamentModifiablePlugins::getItemOrDefaultItem($this->slugs, $resource));
    }
}
