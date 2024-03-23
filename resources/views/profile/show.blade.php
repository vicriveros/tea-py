<x-app-layout>
    <x-page-title>
        <x-slot name="title">
            {{ 'Mi Perfil' }}
        </x-slot>
    </x-page-title>

    <div class="grid grid-cols-1 gap-9 sm:grid-cols-2 mx-3 mb-4">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
            @livewire('profile.update-profile-information-form')
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
            @livewire('profile.update-password-form')
        @endif

        @livewire('profile.logout-other-browser-sessions-form')

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            @livewire('profile.delete-user-form')
        @endif
    </div>

    
</x-app-layout>
