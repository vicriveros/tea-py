<div>
    <x-page-title>
        <x-slot name="title"> {{ 'Tratamientos' }} </x-slot>
    </x-page-title>

    <x-form-section submit="save">
        <x-slot name="title">
            {{ 'Editar Tratamientos' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>

                <div class="mb-4.5">
                    <x-label for="name" value="{{ 'Tratamiento Nombre' }}" />
                    <x-input wire:model="nombre" id="name" type="text" required placeholder="Nombre" />
                    <x-input-error for="nombre" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
            
                <x-message> {{ 'Registro Actualizado!' }}  </x-message>


                <div class="flex justify-end gap-4">
                    <x-button type="submit" >
                        {{ 'Agregar' }}
                    </x-button>    
                </div>
            </div>
            <div class="overflow-x-auto mt-5">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                        <tr>
                            <x-th> Nombre </x-th>
                            <x-th> </x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tratamientos as $trata)
                            <tr wire:key="{{ $trata->id }}">
                                <x-td> {{ $trata->nombre }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete({{ $trata->id }})" wire:confirm="Seguro que desea eliminar este registro?">
                                        <i class="fa-solid fa-trash"></i>
                                    </x-danger-button> 
                                </x-td>                       
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tratamientos->links() }}
            </div>

        </div>
        </div>

    </x-form-section>

</div>
