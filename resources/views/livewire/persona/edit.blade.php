<div>

    <x-page-title>
        <x-slot name="title"> {{ 'Personas' }} </x-slot>
    </x-page-title>

    <x-form-section submit="update">
        <x-slot name="title">
            {{ 'Editar Paciente' }}
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