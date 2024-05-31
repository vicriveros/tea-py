<div>
<x-form-section submit="save">
        <x-slot name="title">
            {{ 'Embarazo' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Planificado?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="prenatal_plani" name="prenatal_plani" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="prenatal_plani" name="prenatal_plani" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="prenatal_plani" class="mt-2" />
                    </div>
                </fieldset>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">Presentó alguna enfermedad durante el embarazo?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="prenatal_enfermedad" name="prenatal_enfermedad" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="prenatal_enfermedad" name="prenatal_enfermedad" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="prenatal_enfermedad" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="prenatal_enfer_nombres" value="{{ 'Describa enfermedades durante el embarazo' }}" />
                    <x-input wire:model="prenatal_enfer_nombres" id="prenatal_enfer_nombres" type="text" />
                    <x-input-error for="prenatal_enfer_nombres" class="mt-2" />
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">Medicamentos durante el embarazo?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="prenatal_medicamentos" name="prenatal_medicamentos" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="prenatal_medicamentos" name="prenatal_medicamentos" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="prenatal_medicamentos" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="prenatal_med_nombres" value="{{ 'Lista de medicamentos' }}" />
                    <x-input wire:model="prenatal_med_nombres" id="prenatal_med_nombres" type="text" />
                    <x-input-error for="prenatal_med_nombres" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="prenatal_madre_edad" value="{{ 'Edad de la madre al momento del embarazo' }}" />
                    <x-input wire:model="prenatal_madre_edad" id="prenatal_madre_edad" type="text" />
                    <x-input-error for="prenatal_madre_edad" class="mt-2" />
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

    <!-- PARTO -->
    <x-form-section submit="save_parto">
        <x-slot name="title">
            {{ 'Datos del Parto' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="nombres" value="{{ 'Caracteristicas' }}" />
                    <select wire:model="nombres" id="nombres" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                        <option value="0">Seleccione</option>
                        <option value="Parto rápido"> Parto rápido</option>
                        <option value="Parto lento"> Parto lento</option>
                        <option value="Parto Normal"> Parto Normal</option>
                        <option value="Parto inducido"> Parto inducido</option>
                        <option value="Cesárea"> Cesárea </option>
                        <option value="Placenta previa"> Placenta previa </option>
                        <option value="Ruptura bolsa">Ruptura bolsa</option>
                        <option value="Bajo peso"> Bajo peso</option>
                        <option value="Sobrepeso"> Sobrepeso</option>
                        <option value="Maduro">Maduro</option>
                        <option value="Post maduro"> Post maduro</option>
                        <option value="Pres. normal"> Pres. normal </option>
                        <option value="Pres. nalgas"> Pres. nalgas </option>
                        <option value="Pres. pie">Pres. pie</option>
                        <option value="Pres. atravesado"> Pres. atravesado</option>
                        <option value="Circulares de cordón"> Circulares de cordón</option>
                        <option value="Color normal">Color normal</option>
                        <option value="Color anormal"> Color anormal</option>
                        <option value="Hemorragia intracraneal"> Hemorragia intracraneal </option>
                        <option value="Ictericia neonatal excesivo"> Ictericia neonatal excesivo </option>
                        <option value="infecciones"> infecciones </option>
                        <option value="Vacunaciones inadecuadas">Vacunaciones inadecuadas</option>
                    </select>
                    <x-input-error for="nombres" class="mt-2">
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
            <div class="overflow-x-auto">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                        <tr>
                            <x-th> Caracteristicas </x-th>
                            <x-th> </x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($partos as $parto)
                            <tr wire:key="{{ $parto->id }}">
                                <x-td> {{ $parto->nombres }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete_parto({{ $parto->id }})" wire:confirm="Seguro que desea eliminar esta caracteristica?">
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
