@if(filament()->auth()->check())
    {{ get_class(filament()->auth()) }}
    <script>
        window.Echo.private('App.Models.User.{{ filament()->auth()->id() }}').listen('.database-notifications.sent', () => {
            Livewire.dispatch('refresh-sidebar')
        });
    </script>
@endif
