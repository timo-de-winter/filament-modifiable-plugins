<?php

namespace TimoDeWinter\FilamentModifiablePlugins\Concerns\ResourceModifications;

use Closure;
use Filament\Schemas\Schema;
use Illuminate\Contracts\Support\Htmlable;

trait CanModifyPageFeatures
{
    protected array $titles = [];

    protected array $slugs = [];

    protected array $tenantOwnershipRelationshipNames = [];

    protected array $customRelations = [];

    protected array $customPages = [];

    protected array $schemas = [];

    /**
     * Setters
     */
    public function title(string|Htmlable|Closure $title, string $resource): static
    {
        $this->titles[$resource] = $title;

        return $this;
    }

    public function slug(string|Closure $slug, string $resource): static
    {
        $this->slugs[$resource] = $slug;

        return $this;
    }

    public function tenantOwnershipRelationshipName(null|string|Closure $tenantOwnershipRelationshipName, string $resource): static
    {
        $this->tenantOwnershipRelationshipNames[$resource] = $tenantOwnershipRelationshipName;

        return $this;
    }

    public function customRelations(array|Closure $relations, string $resource): static
    {
        $this->customRelations[$resource] = $relations;

        return $this;
    }

    public function customPages(array|Closure $pages, string $resource): static
    {
        $this->customPages[$resource] = $pages;

        return $this;
    }

    public function schema(Closure $schema, string $resource): static
    {
        $this->schemas[$resource] = $schema;

        return $this;
    }

    /**
     * Getters
     */
    public function getTitle(string $resource): null|string|Htmlable
    {
        return $this->evaluate($this->titles[$resource] ?? null);
    }

    public function getSlug(string $resource): ?string
    {
        return $this->evaluate($this->slugs[$resource] ?? null);
    }

    public function getTenantOwnershipRelationshipName(string $resource): ?string
    {
        return $this->evaluate($this->tenantOwnershipRelationshipNames[$resource] ?? null);
    }

    public function getCustomRelations(string $resource): ?array
    {
        return $this->evaluate($this->customRelations[$resource] ?? null);
    }

    public function getCustomPages(string $resource): ?array
    {
        return $this->evaluate($this->customPages[$resource] ?? null);
    }

    public function getSchema(Schema $schema, Closure $defaultSchema, string $resource): Schema
    {
        return $this->evaluate($this->schemas[$resource] ?? $defaultSchema, [
            'schema' => $schema,
        ]);
    }
}
