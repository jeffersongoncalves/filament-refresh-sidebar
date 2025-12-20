<?php

namespace JeffersonGoncalves\Filament\RefreshSidebarEcho;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class RefreshSidebarEchoServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('filament-refresh-sidebar-echo')
            ->hasViews();
    }
}
