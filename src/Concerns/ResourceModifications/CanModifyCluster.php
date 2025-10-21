<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns\ResourceModifications;

use Closure;

trait CanModifyCluster
{
    protected array $clusters = [];

    public function cluster(string|Closure $cluster, string $resource): static
    {
        $this->clusters[$resource] = $cluster;

        return $this;
    }

    public function getCluster(string $resource): string|null
    {
        return $this->evaluate($this->clusters[$resource] ?? null);
    }
}
