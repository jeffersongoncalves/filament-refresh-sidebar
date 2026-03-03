## Filament Refresh Sidebar

A lightweight Filament plugin that keeps sidebar navigation in sync by automatically refreshing when database notifications arrive via Laravel Echo, or manually via a dispatched Livewire event.

### Installation

@verbatim
<code-snippet name="Install the plugin" lang="bash">
composer require jeffersongoncalves/filament-refresh-sidebar
</code-snippet>
@endverbatim

### Register Plugin

@verbatim
<code-snippet name="Register in PanelProvider" lang="php">
use JeffersonGoncalves\Filament\RefreshSidebar\RefreshSidebarPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        ->plugins([
            RefreshSidebarPlugin::make(),
        ]);
}
</code-snippet>
@endverbatim

### Manual Refresh from Livewire

@verbatim
<code-snippet name="Dispatch refresh-sidebar event" lang="php">
$this->dispatch('refresh-sidebar');
</code-snippet>
@endverbatim

### Features
- Automatic sidebar refresh when database notifications arrive via Laravel Echo
- Manual sidebar refresh by dispatching the `refresh-sidebar` Livewire event
- Zero configuration after plugin registration
- Injects a script via `PanelsRenderHook::SCRIPTS_AFTER`

### Best Practices
- Ensure Laravel Echo is configured for automatic notification-based refresh
- Dispatch `refresh-sidebar` after creating, updating, or deleting records that affect navigation badges
- No config files or migrations needed -- works out of the box
