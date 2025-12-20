<?php

namespace JeffersonGoncalves\Filament\RefreshSidebarEcho;

use Filament\Contracts\Plugin;
use Filament\Panel;

class RefreshSidebarEchoPlugin implements Plugin
{
    public static function make(): static
    {
        return app(static::class);
    }

    public function getId(): string
    {
        return 'filament-refresh-sidebar-echo';
    }

    public function register(Panel $panel): void
    {

    }

    public function boot(Panel $panel): void
    {

    }
}
