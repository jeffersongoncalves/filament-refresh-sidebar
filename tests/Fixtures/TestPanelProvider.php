<?php

namespace JeffersonGoncalves\Filament\RefreshSidebar\Tests\Fixtures;

use Filament\Panel;
use Filament\PanelProvider;
use JeffersonGoncalves\Filament\RefreshSidebar\RefreshSidebarPlugin;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('test')
            ->path('test')
            ->plugin(RefreshSidebarPlugin::make());
    }
}
