<?php

use Illuminate\Support\Facades\Blade;
use JeffersonGoncalves\Filament\RefreshSidebar\RefreshSidebarPlugin;

it('loads every class it ships', function (string $class) {
    expect(class_exists($class) || interface_exists($class) || trait_exists($class))->toBeTrue();
})->with([
    ['JeffersonGoncalves\\Filament\\RefreshSidebar\\RefreshSidebarPlugin'],
    ['JeffersonGoncalves\\Filament\\RefreshSidebar\\RefreshSidebarServiceProvider'],
]);

it('compiles every Blade view it ships', function (string $file) {
    expect(Blade::compileString((string) file_get_contents(__DIR__.'/../../'.$file)))->toBeString();
})->with([
    ['resources/views/scripts.blade.php'],
]);

it('registers on a panel', function () {
    $panel = Filament\Facades\Filament::getPanel('test');

    expect($panel->hasPlugin(RefreshSidebarPlugin::make()->getId()))->toBeTrue();
});
