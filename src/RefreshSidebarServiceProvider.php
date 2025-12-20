<?php

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
