<?php

namespace TimoDeWinter\FilamentModifiablePlugins;

use Closure;
use Filament\Support\Concerns\EvaluatesClosures;

class FilamentModifiablePlugins
{
    use EvaluatesClosures;

    protected array $clusters = [];

    public function getItemOrDefaultItem(array $items, $resource): mixed
    {
        if (array_key_exists($resource, $items)) {
            return $items[$resource];
        }

        if (array_key_exists('default', $items)) {
            return $items['default'];
        }

        return null;
    }

    public function cluster(string|Closure $cluster, string $resource = 'default'): static
    {
        $this->clusters[$resource] = $cluster;

        return $this;
    }

    public function getCluster(string $resource = 'default'): Closure|string|null
    {
        return $this->evaluate($this->getItemOrDefaultItem($this->clusters, $resource));
    }
}
