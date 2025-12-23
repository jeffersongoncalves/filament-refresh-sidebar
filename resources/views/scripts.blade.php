@if(filament()->auth()->check())
    <script>
        if (window.Echo !== undefined && window.Livewire !== undefined) {
            window.Echo.private('{{ str(get_class(filament()->auth()->user()))->replace('\\','.') }}.{{ filament()->auth()->user()->getAuthIdentifier() }}').listen('.database-notifications.sent', () => {
                window.Livewire.dispatch('refresh-sidebar')
            });
        }
    </script>
@endif
