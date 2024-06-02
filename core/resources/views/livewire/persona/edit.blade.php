<div>

    <x-page-title>
        <x-slot name="title"> {{ 'Pacientes' }} </x-slot>
    </x-page-title>

    <x-form-section submit="update">
        <x-slot name="title">
            {{ 'Editar Persona' }}
        </x-slot>

        <div class="p-6.5">
            <div class="mb-4.5">
                <x-label for="name" value="{{ 'Nombre' }}" />
                <x-input wire:model="nombre" id="name" type="text" required placeholder="Nombre" />
                <x-input-error for="nombre" class="mt-2">
                    {{ 'Este campo es requerido.' }}
                </x-input-error>
            </div>

            <div class="mb-4.5">
                <x-label for="apellido" value="{{ 'Apellido' }}" />
                <x-input wire:model="apellido" id="apellido" type="text" required  placeholder="Apellido" />
                <x-input-error for="apellido" class="mt-2" />
            </div>

            
            <div class="mb-4.5">
                <x-label for="documento" value="{{ 'Documento' }}" />
                <x-input wire:model="documento" id="documento" type="text" required  placeholder="Documento" />
                <x-input-error for="documento" class="mt-2" />
            </div>

            <div class="mb-4.5">
                <x-label for="fecha_nacimiento" value="{{ 'Fecha Nacimiento' }}" />
                <x-input wire:model="fecha_nacimiento" id="fecha_nacimiento" type="text" required  placeholder="Fecha Nacimiento" />
                <x-input-error for="fecha_nacimiento" class="mt-2" />
            </div>

            <div class="mb-4.5">
                <x-label for="direccion" value="{{ 'Dirección' }}" />
                <x-input wire:model="direccion" id="direccion" type="text"  placeholder="Dirección" />
                <x-input-error for="direccion" class="mt-2" />
            </div>

            <div class="mb-4.5">
                <x-label for="barrio" value="{{ 'Barrio' }}" />
                <x-input wire:model="barrio" id="barrio" type="text"  placeholder="Barrio" />
                <x-input-error for="barrio" class="mt-2" />
            </div>

            <div class="mb-4.5">
                <x-label for="telefono" value="{{ 'Teléfono' }}" />
                <x-input wire:model="telefono" id="telefono" type="text" required  placeholder="Teléfono" />
                <x-input-error for="telefono" class="mt-2" />
            </div>

            <div class="mb-4.5">
                <x-label for="mail" value="{{ 'E-mail' }}" />
                <x-input wire:model="mail" id="mail" type="text" required  placeholder="E-mail" />
                <x-input-error for="mail" class="mt-2" />
            </div>

          
            <x-message> {{ 'Registro Actualizado!' }}  </x-message>


            <div class="flex justify-end gap-4">
                <x-button type="submit" >
                    {{ 'Guardar' }}
                </x-button>    
                <x-danger-button wire:click="delete({{ $id }})" wire:confirm="Seguro que desea eliminar este paciente?">
                    {{ 'Eliminar' }}
                </x-danger-button>
            
            </div>

        </div>

    </x-form-section>

</div>