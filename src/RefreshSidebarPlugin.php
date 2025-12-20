<?php

namespace JeffersonGoncalves\Filament\RefreshSidebar;

use Filament\Contracts\Plugin;
use Filament\Panel;

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

    }

    public function boot(Panel $panel): void
    {

    }
}
