{{-- Boost guideline for timo-de-winter/filament-modifiable-plugins. Update when src/Concerns/* change. --}}
# Filament Modifiable Plugins (plugin customization)

- Lets an app customize a Filament plugin's resources (navigation, schemas, tables, clusters) from the panel provider — without subclassing or copying resource classes. Plugins opt in via traits.

## Structure

- `TimoDeWinter\FilamentModifiablePlugins\Concerns\CanModifyResources` — trait for plugin classes; exposes the fluent customization API to apps.
- `TimoDeWinter\FilamentModifiablePlugins\Concerns\CanBeModified` — trait for resource classes; makes the resource pick up registered modifications.
- `TimoDeWinter\FilamentModifiablePlugins\CustomizableTable` — used by resources to declare default table pieces.
- `FilamentModifiablePlugins` facade → container-singleton manager holding all registered modifications.

## Customizing a plugin's resources (app side)

Chain modifiers on the plugin in your panel provider. Every modifier requires the target resource class as its final argument, and every value may be a `Closure` for dynamic evaluation. Working modifiers: `label`, `icon`, `activeIcon`, `navigationGroup`, `parentItem`, `sort`, `badge`, `badgeColor`, `badgeTooltip`, `cluster`, `schema`, `customTable`, `customRelations`, `customPages`.

@verbatim
<code-snippet name="Customizing plugin resources from a panel provider" lang="php">
SomePlugin::make()
    ->navigationGroup('Settings', UserResource::class)
    ->label('System users', UserResource::class)
    ->badge(fn (): string => (string) User::count(), UserResource::class)
    ->schema(fn (Schema $schema): Schema => $schema->components([
        TextInput::make('name')->required(),
    ]), UserResource::class)
    ->customTable(fn (Table $table): Table => $table
        ->columns([TextColumn::make('name')]), UserResource::class),
</code-snippet>
@endverbatim

## Making a plugin modifiable (author side)

Add `CanModifyResources` to the plugin class and `CanBeModified` to each resource, then route every default through the `getCustom*` helpers — a plain `schema()`/`table()`/`getRelations()`/`getPages()` body ignores app customizations.

@verbatim
<code-snippet name="Modifiable resource" lang="php">
class UserResource extends Resource
{
    use CanBeModified;

    public static function table(Table $table): Table
    {
        return self::getCustomTable($table, fn (CustomizableTable $table) => $table
            ->defaultColumns([/* ... */])
            ->defaultFilters([/* ... */])
            ->defaultRecordActions([/* ... */])
            ->defaultToolbarActions([/* ... */]));
    }

}
</code-snippet>
@endverbatim

Wrap the other defaults the same way: `schema()` through `self::getCustomSchema($schema, $defaultClosure)`, `getRelations()` through `self::getCustomRelations([...])`, `getPages()` through `self::getCustomPages([...])`.

## Pitfalls

- **Never copy or subclass a plugin's resource classes to change labels, navigation, schemas, or tables.** Register modifications on the plugin instead.
- **The resource class argument is required on every modifier** — there is no "apply to all resources" shorthand.
- **Table tweaks go through `customTable()`** — the granular `columns`/`filters`/`recordActions`/`toolbarActions` modifiers crash on use (return-type bug), and `title`/`slug`/`tenantOwnershipRelationshipName` are stored but never consumed.
- **The manager is a container singleton holding boot-time state.** Never add it to Octane's flush/reset lists.
