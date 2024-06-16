<div>
    <x-form-section submit="save_enfer">
        <x-slot name="title">
            {{ 'Antecedentes de Salud' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="enfermedad_id" value="{{ 'Trastornos Gastrointestinales' }}" />
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

    <x-form-section submit="save_alimenticios">
        <x-slot name="title">
            {{ 'Alimentación - Describa su rutina alimentaria' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4.5">
                    <x-label for="desayuno" value="{{ 'Desayuno' }}" />
                    <x-input wire:model="desayuno" id="desayuno" type="text" />
                    <x-input-error for="desayuno" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="media_manana" value="{{ 'Media Mañana ' }}" />
                    <x-input wire:model="media_manana" id="media_manana" type="text" />
                    <x-input-error for="media_manana" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="almuerzo" value="{{ 'Almuerzo ' }}" />
                    <x-input wire:model="almuerzo" id="almuerzo" type="text" />
                    <x-input-error for="almuerzo" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="merienda" value="{{ 'Merienda ' }}" />
                    <x-input wire:model="merienda" id="merienda" type="text" />
                    <x-input-error for="merienda" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="cena" value="{{ 'Cena ' }}" />
                    <x-input wire:model="cena" id="cena" type="text" />
                    <x-input-error for="cena" class="mt-2" />
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

    <x-form-section submit="save_salud">
        <x-slot name="title">
            {{ 'Salud' }}
        </x-slot>

        <div class="p-6.5">
            <div class="mb-4.5">
                <x-label for="descripcion" value="{{ 'Otras características a nivel de salud:' }}" />
                <textarea wire:model="descripcion" id="descripcion" rows="4" cols="50" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter'"> </textarea>
                <x-input-error for="descripcion" class="mt-2">
                    {{ 'Este campo es requerido.' }}
                </x-input-error>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Sigue tratamiento médico?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="trata_med" name="trata_med" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="trata_med" name="trata_med" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="trata_med" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="trata_med_nombres" value="{{ '¿Cómo se llama su doctor/a? ' }}" />
                    <x-input wire:model="trata_med_nombres" id="trata_med_nombres" type="text" />
                    <x-input-error for="trata_med_nombres" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="trata_med_seguro" value="{{ '¿Cómo se llama su seguro médico? ' }}" />
                    <x-input wire:model="trata_med_seguro" id="trata_med_seguro" type="text" />
                    <x-input-error for="trata_med_seguro" class="mt-2" />
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Está tomando medicinas actualmente?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="toma_med" name="toma_med" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="toma_med" name="toma_med" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="toma_med" class="mt-2" />
                    </div>
                </fieldset>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Sabe las razones?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="toma_med_razon" name="toma_med_razon" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="toma_med_razon" name="toma_med_razon" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="toma_med_razon" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="toma_med_nombres" value="{{ '¿Cómo se llaman las medicinas que toma?' }}" />
                    <x-input wire:model="toma_med_nombres" id="toma_med_nombres" type="text" />
                    <x-input-error for="toma_med_nombres" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="toma_med_dosis" value="{{ 'Dosis' }}" />
                    <x-input wire:model="toma_med_dosis" id="toma_med_dosis" type="text" />
                    <x-input-error for="toma_med_dosis" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="toma_med_frec" value="{{ 'Frecuencia' }}" />
                    <x-input wire:model="toma_med_frec" id="toma_med_frec" type="text" />
                    <x-input-error for="toma_med_frec" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="otros_trata" value="{{ 'Especificar otros tratamientos' }}" />
                    <x-input wire:model="otros_trata" id="otros_trata" type="text" />
                    <x-input-error for="otros_trata" class="mt-2" />
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Usa alguna otra medicina para su salud por ejemplo; cremas, u otras? </legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="otra_med" name="otra_med" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="otra_med" name="otra_med" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="otra_med" class="mt-2" />
                    </div>
                </fieldset>
                
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

