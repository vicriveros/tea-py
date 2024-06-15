<div>
    <x-form-section submit="save">
        <x-slot name="title">
            {{ 'Desarrollo motor' }}
        </x-slot>
        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4.5">
                    <x-label for="soscabeza" value="{{ 'Sostuvo la cabeza' }}" />
                    <x-input wire:model="soscabeza" id="soscabeza" type="text" />
                    <x-input-error for="soscabeza" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <div class="mb-4.5">
                    <x-label for="sesento" value="{{ 'Se sentó' }}" />
                    <x-input wire:model="sesento" id="sesento" type="text" />
                    <x-input-error for="sesento" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <div class="mb-4.5">
                    <x-label for="gateo" value="{{ 'Gateó' }}" />
                    <x-input wire:model="gateo" id="gateo" type="text" />
                    <x-input-error for="gateo" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <div class="mb-4.5">
                    <x-label for="separo" value="{{ 'Se paró' }}" />
                    <x-input wire:model="separo" id="separo" type="text" />
                    <x-input-error for="separo" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <div class="mb-4.5">
                    <x-label for="camino_apoyado" value="{{ 'Caminó apoyado' }}" />
                    <x-input wire:model="camino_apoyado" id="camino_apoyado" type="text" />
                    <x-input-error for="camino_apoyado" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <div class="mb-4.5">
                    <x-label for="camino_solo" value="{{ 'Caminó solo' }}" />
                    <x-input wire:model="camino_solo" id="camino_solo" type="text" />
                    <x-input-error for="camino_solo" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <div class="mb-4.5">
                    <x-label for="control_esfinters" value="{{ 'Control de esfinteres' }}" />
                    <x-input wire:model="control_esfinters" id="control_esfinters" type="text" />
                    <x-input-error for="control_esfinters" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Tuvo alguna dificultad motora?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="dif_motora" name="dif_motora" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="dif_motora" name="dif_motora" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="dif_motora" class="mt-2" />
                    </div>
                </fieldset>
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Necesitó tratamiento especial?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="trata_especial" name="trata_especial" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="trata_especial" name="trata_especial" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="trata_especial" class="mt-2" />
                    </div>
                </fieldset>
                <div class="mb-4.5">
                    <x-label for="trata_especial_tiempo" value="{{ '¿Cuánto tiempo? ' }}" />
                    <x-input wire:model="trata_especial_tiempo" id="trata_especial_tiempo" type="text" />
                    <x-input-error for="trata_especial_tiempo" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
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
