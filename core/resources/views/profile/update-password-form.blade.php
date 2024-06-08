<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ 'Actualizar Contraseña' }}
    </x-slot>
    <div class="p-6.5">
        <div class="mb-4.5">
            <x-label for="current_password" value="{{ __('Contraseña Actual') }}" />
            <x-input id="current_password" type="password" wire:model="state.current_password" autocomplete="current-password" />
            <x-input-error for="current_password" class="mt-2" />
        </div>
        <div class="mb-4.5">
            <x-label for="password" value="{{ __('Nueva Contraseña') }}" />
            <x-input id="password" type="password" wire:model="state.password" autocomplete="new-password" />
            <x-input-error for="password" class="mt-2" />
        </div>
        <div class="mb-4.5">
        <x-label for="password_confirmation" value="{{ __('Confirmar Contraseña') }}" />
            <x-input id="password_confirmation" type="password" wire:model="state.password_confirmation" autocomplete="new-password" />
            <x-input-error for="password_confirmation" class="mt-2" />
        </div>

        <x-action-message class="me-3" on="saved">
            {{ 'Registro Guardado!' }}
        </x-action-message>

        <div class="flex justify-end">
            <x-button type="submit" >
                {{ 'Actualizar' }}
            </x-button>
        </div>

    </div>
</x-form-section>
