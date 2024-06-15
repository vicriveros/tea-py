<div>
<x-form-section submit="save_trata">
        <x-slot name="title">
            {{ 'Examenes' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="tratamiento_id" value="{{ 'Examen' }}" />
                    <select wire:model="tratamiento_id" id="tratamiento_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($tratamientos as $trata)
                            <option value="{{ $trata->id }}">{{ $trata->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="tratamiento_id" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="fecha_eval" value="{{ 'Fecha de la Evaluación' }}" />
                    <x-input wire:model="fecha_eval" id="fecha_eval" type="date" />
                    <x-input-error for="fecha_eval" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="nombre_medico" value="{{ 'Nombre del Profesional / Tel.' }}" />
                    <x-input wire:model="nombre_medico" id="nombre_medico" type="text" />
                    <x-input-error for="nombre_medico" class="mt-2" />
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
                            <x-th> Fecha de la Evaluación </x-th>
                            <x-th> Nombre del Profesional </x-th>
                            <x-th> </x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pa_tratamientos as $trata)
                            <tr wire:key="{{ $trata->id }}">
                                <x-td> {{App\Livewire\Paciente\Tratamientos::getTratamientoName($trata->tratamiento_id) }} </x-td>
                                <x-td> {{ $trata->fecha_eval }} </x-td>
                                <x-td> {{ $trata->nombre_medico }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete_trata({{ $trata->id }})" wire:confirm="Seguro que desea eliminar este registro?">
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
