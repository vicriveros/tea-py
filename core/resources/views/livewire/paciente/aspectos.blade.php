<div>
    <x-form-section submit="save_enfer">
        <x-slot name="title">
            {{ 'Enfermedades Presentadas' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="enfermedad_id" value="{{ 'Enfermedad' }}" />
                    <select wire:model="enfermedad_id" id="enfermedad_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($enfermedades as $enfer)
                            <option value="{{ $enfer->id }}">{{ $enfer->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="enfermedad_id" class="mt-2">
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
                        @foreach ($pa_enfermedades as $enfer)
                            <tr wire:key="{{ $enfer->id }}">
                                <x-td> {{App\Livewire\Paciente\Aspectos::getEnfermedadesName($enfer->enfermedad_id) }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete_enfer({{ $enfer->id }})" wire:confirm="Seguro que desea eliminar este registro?">
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

    <x-form-section submit="save">
        <x-slot name="title">
            {{ 'Alergias' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4.5">
                    <x-label for="aspsalud_prod" value="{{ '¿Qué se las produce?' }}" />
                    <x-input wire:model="aspsalud_prod" id="aspsalud_prod" type="text" />
                    <x-input-error for="aspsalud_prod" class="mt-2" />
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Tiene algún tratamiento médico fijo? </legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="aspsalud_tratamed" name="aspsalud_tratamed" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="aspsalud_tratamed" name="aspsalud_tratamed" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="aspsalud_tratamed" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="aspsalud_toma" value="{{ '¿Qué toma?  ' }}" />
                    <x-input wire:model="aspsalud_toma" id="aspsalud_toma" type="text" />
                    <x-input-error for="aspsalud_toma" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="aspsalud_necmed" value="{{ '¿Por qué necesita ese medicamento?' }}" />
                    <x-input wire:model="aspsalud_necmed" id="aspsalud_necmed" type="text" />
                    <x-input-error for="aspsalud_necmed" class="mt-2" />
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Ha sufrido alguna vez un accidente? </legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="aspsalud_acci" name="aspsalud_acci" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="aspsalud_acci" name="aspsalud_acci" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="aspsalud_acci" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="aspsalud_acci_exp" value="{{ 'Explique el accidente' }}" />
                    <x-input wire:model="aspsalud_acci_exp" id="aspsalud_acci_exp" type="text" />
                    <x-input-error for="aspsalud_acci_exp" class="mt-2" />
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Ha sido operado alguna vez?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="aspsalud_opera" name="aspsalud_opera" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="aspsalud_opera" name="aspsalud_opera" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="aspsalud_opera" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="aspsalud_opera_exp" value="{{ 'Explique la operaión' }}" />
                    <x-input wire:model="aspsalud_opera_exp" id="aspsalud_opera_exp" type="text" />
                    <x-input-error for="aspsalud_opera_exp" class="mt-2" />
                </div>

                
            </div><!--end grid -->

            <x-message> {{ 'Registro Actualizado!' }}  </x-message>

            <div class="flex justify-end gap-4">
                <x-button type="submit" >
                    {{ 'Guardar' }}
                </x-button>    
            </div>
        </div>
    </x-form-section>

</div>
