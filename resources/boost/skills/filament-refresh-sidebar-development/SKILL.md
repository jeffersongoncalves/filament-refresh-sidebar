---
name: filament-refresh-sidebar-development
description: Build and work with the Filament Refresh Sidebar plugin, including automatic and manual sidebar navigation refresh.
---

# Filament Refresh Sidebar Development

## When to use this skill

Use this skill when:
- Setting up automatic sidebar refresh for dynamic navigation badges
- Triggering manual sidebar refresh after CRUD operations
- Integrating sidebar refresh with Laravel Echo database notifications
- Troubleshooting sidebar not updating after data changes

## Architecture

This plugin is minimal by design. It consists of:
- `RefreshSidebarPlugin` - Filament plugin that registers a render hook for JavaScript injection
- `RefreshSidebarServiceProvider` - Package service provider that registers views

### Namespace

```
JeffersonGoncalves\Filament\RefreshSidebar
```

### Key Classes

| Class | Path | Purpose |
|-------|------|---------|
| `RefreshSidebarPlugin` | `src/RefreshSidebarPlugin.php` | Plugin class, registers script render hook |
| `RefreshSidebarServiceProvider` | `src/RefreshSidebarServiceProvider.php` | Service provider, registers views |

## Installation

```bash
composer require jeffersongoncalves/filament-refresh-sidebar
```

## Configuration

### Register the Plugin

No config files are needed. Register the plugin in your `PanelProvider`:

```php
use JeffersonGoncalves\Filament\RefreshSidebar\RefreshSidebarPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            RefreshSidebarPlugin::make(),
        ]);
}
```

## How It Works

### Plugin Class

The plugin registers a JavaScript snippet via `PanelsRenderHook::SCRIPTS_AFTER`:

```php
namespace JeffersonGoncalves\Filament\RefreshSidebar;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\View\PanelsRenderHook;
use Illuminate\Contracts\View\View;

class RefreshSidebarPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'filament-refresh-sidebar';
    }

    public function register(Panel $panel): void
    {
        $panel->renderHook(
            PanelsRenderHook::SCRIPTS_AFTER,
            fn (): View => view('filament-refresh-sidebar::scripts')
        );
    }

    public function boot(Panel $panel): void {}
}
```

### Service Provider

```php
namespace JeffersonGoncalves\Filament\RefreshSidebar;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RefreshSidebarServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-refresh-sidebar')
            ->hasViews();
    }
}
```

## Usage

### Automatic Refresh (Laravel Echo)

When Laravel Echo is configured, the plugin automatically listens for database notification events and triggers a sidebar refresh. This keeps navigation badges and menu items in sync without a full page reload.

Prerequisites:
- Laravel Echo installed and configured
- Database notifications enabled
- Broadcasting driver configured (Pusher, Reverb, Soketi, etc.)

### Manual Refresh

Dispatch the `refresh-sidebar` event from any Livewire component:

```php
// After creating a record
$this->dispatch('refresh-sidebar');
```

### Common Use Cases

#### After Creating a Record
```php
protected function afterCreate(): void
{
    $this->dispatch('refresh-sidebar');
}
```

#### After Deleting a Record
```php
protected function afterDelete(): void
{
    $this->dispatch('refresh-sidebar');
}
```

#### After a Custom Action
```php
use Filament\Actions\Action;

Action::make('approve')
    ->action(function () {
        // ... approval logic
        $this->dispatch('refresh-sidebar');
    }),
```

#### After Updating a Record
```php
protected function afterSave(): void
{
    $this->dispatch('refresh-sidebar');
}
```

## Troubleshooting

### Sidebar Not Refreshing Automatically
**Cause**: Laravel Echo is not configured or broadcasting driver is missing.
**Solution**: Ensure Laravel Echo is installed (`npm install laravel-echo`), broadcasting is configured in `.env`, and the Echo connection is established in the browser.

### Manual Refresh Not Working
**Cause**: The `refresh-sidebar` event is not being dispatched correctly.
**Solution**: Ensure you call `$this->dispatch('refresh-sidebar')` from within a Livewire component. The event name must match exactly.

### Navigation Badges Not Updating
**Cause**: The sidebar refresh triggers a re-render, but the badge count query may be cached.
**Solution**: Ensure your `getNavigationBadge()` method performs a fresh query and does not rely on cached values.
