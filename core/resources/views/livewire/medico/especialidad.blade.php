<div>
    <x-form-section submit="save_espe">
        <x-slot name="title">
            {{ 'Especialidades del profesional' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="especialidad_id" value="{{ 'Especialidad' }}" />
                    <select wire:model="especialidad_id" id="especialidad_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($especialidades as $espe)
                            <option value="{{ $espe->id }}">{{ $espe->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="especialidad_id" class="mt-2">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($me_especialidades as $espe)
                            <tr wire:key="{{ $espe->id }}">
                                <x-td> {{App\Livewire\Medico\Especialidad::getEspecialidadesName($espe->especialidad_id) }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete_espe({{ $espe->id }})" wire:confirm="Seguro que desea eliminar este registro?">
                                        <i class="fa-solid fa-trash"></i>
                                    </x-danger-button> 
                                </x-td>                       
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        </div>
    </x-form-section>
</div>
