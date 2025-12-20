<div class="filament-hidden">

![Filament Refresh Sidebar](https://raw.githubusercontent.com/jeffersongoncalves/filament-refresh-sidebar/1.x/art/jeffersongoncalves-filament-refresh-sidebar.png)

</div>

# Filament Refresh Sidebar

[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeffersongoncalves/filament-refresh-sidebar.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-refresh-sidebar)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/jeffersongoncalves/filament-refresh-sidebar/fix-php-code-style-issues.yml?branch=1.x&label=code%20style&style=flat-square)](https://github.com/jeffersongoncalves/filament-refresh-sidebar/actions?query=workflow%3A"Fix+PHP+code+styling"+branch%3A1.x)
[![Total Downloads](https://img.shields.io/packagist/dt/jeffersongoncalves/filament-refresh-sidebar.svg?style=flat-square)](https://packagist.org/packages/jeffersongoncalves/filament-refresh-sidebar)

## Description

**Filament Refresh Sidebar** is a lightweight plugin designed to keep your Filament sidebar navigation in sync. It's particularly useful when you have dynamic navigation badges or menu items that depend on database changes, ensuring the sidebar updates automatically without a full page reload.

## Requirements

- PHP 8.2 or higher
- Filament 4.0 or higher

## Installation

You can install the package via composer:

```bash
composer require jeffersongoncalves/filament-refresh-sidebar
```

## Usage

Register the plugin in your Filament Panel Provider (typically `app/Providers/Filament/AdminPanelProvider.php`):

```php
use JeffersonGoncalves\Filament\RefreshSidebar\RefreshSidebarPlugin;

public function panel(Panel $panel): Panel
{
    return $panel
        // ... other configuration
        ->plugins([
            RefreshSidebarPlugin::make(),
        ]);
}
```

### Automatic Refresh

The plugin automatically listens for database notifications via Laravel Echo (if configured) and triggers a sidebar refresh when a new notification is received.

### Manual Refresh

You can also manually trigger a sidebar refresh from any Livewire component by dispatching the `refresh-sidebar` event:

```php
$this->dispatch('refresh-sidebar');
```

This is useful for updating navigation badges after custom actions like creating, updating, or deleting records.

## Development

You can run code analysis and formatting using the following commands:

```bash
# Run static analysis
composer analyse

# Format code
composer format
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jèfferson Gonçalves](https://github.com/jeffersongoncalves)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
