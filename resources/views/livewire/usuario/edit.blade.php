<div>

    <x-page-title>
        <x-slot name="title"> {{ 'Usuarios' }} </x-slot>
    </x-page-title>

    <x-form-section submit="update">
        <x-slot name="title">
            {{ 'Editar Usuario' }}
        </x-slot>

        <div class="p-6.5">
            <div class="mb-4.5">
                <x-label for="name" value="{{ 'Nombre' }}" />
                <x-input wire:model="username" id="name" type="text" required placeholder="Nombre" />
                <x-input-error for="username" class="mt-2">
                    {{ 'Este campo es requerido.' }}
                </x-input-error>
            </div>

            <div class="mb-4.5">
                <x-label for="email" value="{{ 'E-mail' }}" />
                <x-input wire:model="email" id="email" type="email" required  placeholder="Email" />
                <x-input-error for="email" class="mt-2" />
            </div>

            <fieldset class="mb-4.5 flex flex-col gap-2">
                <div>
                    <legend class="mb-3 block text-sm font-medium text-black">Rol del Usuario</legend>
                </div>

                <div class="flex gap-6">
                    @foreach($roles as $rol)
                        <label wire:key="{{ $rol->id }}" class="flex items-center gap-2">
                            <input wire:model="user_rol" name="user_rol" type="radio" value="{{ $rol->name }}" />
                            {{ $rol->name }}
                        </label>
                    @endforeach
                   
                </div>

                <x-input-error for="rol" class="mt-2" />
            </fieldset>
            
            <x-message> {{ 'Registro Actualizado!' }}  </x-message>


            <div class="flex justify-end">
                <x-button type="submit" >
                    {{ 'Guardar' }}
                </x-button>
            </div>

        </div>

    </x-form-section>

</div>