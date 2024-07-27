<div>
    <x-form-section submit="save_esp">
            <x-slot name="title">
                {{ 'Especialidaes del profesional' }}
            </x-slot>
    
            <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                
                <div>
                    <div class="mb-4.5">
                        <x-label for="especalidad_id" value="{{ 'Especialidad' }}" />
                        <select wire:model="especalidad_id" id="especalidad_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                           <option value="0">Seleccione</option>
                            @foreach($especialidad as $esp)
                                <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="especalidad_id" class="mt-2">
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
                                <x-th> Especialidades </x-th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($me_espe as $esp)
                                <tr wire:key="{{ $esp->id }}">
                                    <x-td> {{App\Livewire\Medico\Especialidad::getEspecialidadName($esp->especalidad_id) }} </x-td>
                                    <x-td> 
                                        <x-danger-button wire:click="delete_asp({{ $esp->id }})" wire:confirm="Seguro que desea eliminar este registro?">
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
    