<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ 'Actualiza tu información.' }}
    </x-slot>
    <div class="p-6.5">
        <div class="mb-4.5">
            <x-label for="name" value="{{ 'Nombre' }}" />
            <x-input id="name" type="text" placeholder="Nombre" wire:model="state.name" required autocomplete="name" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <div class="mb-4.5">
            <x-label for="email" value="{{ 'E-mail' }}" />
            <x-input id="email" type="email" wire:model="state.email" required autocomplete="username" placeholder="Email" />
            <x-input-error for="name" class="mt-2" />
        </div>

        <x-action-message class="me-3" on="saved">
            {{ 'Registro Guardado!' }}
        </x-action-message>
            
        <div class="flex justify-end">
            <x-button type="submit" >
                {{ 'Guardar' }}
            </x-button>
        </div>

    </div>
</x-form-section>
