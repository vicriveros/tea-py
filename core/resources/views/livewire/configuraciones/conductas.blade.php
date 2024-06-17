<div>
    <x-page-title>
        <x-slot name="title"> {{ 'Conductas' }} </x-slot>
    </x-page-title>

    <x-form-section submit="save">
        <x-slot name="title">
            {{ 'Editar Conductas' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>

                <div class="mb-4.5">
                    <x-label for="name" value="{{ 'Conductas Nombre' }}" />
                    <x-input wire:model="nombre" id="name" type="text" required placeholder="Nombre" />
                    <x-input-error for="nombre" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <div class="mb-4.5">
                    <x-label for="tipo" value="{{ 'Tipo de Conducta' }}" />
                    <select wire:model="tipo" id="tipo" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                        <option value="0">Seleccione</option>
                        <option value="1"> Conductuales</option>
                        <option value="2"> Emocionales</option>
                    </select>
                    <x-input-error for="tipo" class="mt-2">
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
                            <x-th> Tipo </x-th>
                            <x-th> </x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conductas as $cond)
                            <tr wire:key="{{ $cond->id }}">
                                <x-td> {{ $cond->nombre }} </x-td>
                                <x-td> {{ App\Livewire\Configuraciones\Conductas::getTipo($cond->tipo) }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete({{ $cond->id }})" wire:confirm="Seguro que desea eliminar este registro?">
                                        <i class="fa-solid fa-trash"></i>
                                    </x-danger-button> 
                                </x-td>                       
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $conductas->links() }}
            </div>

        </div>
        </div>

    </x-form-section>

</div>

