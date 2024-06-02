<div>
    <x-form-section submit="save">
            <x-slot name="title">
                {{ 'Datos del Nacimiento' }}
            </x-slot>

            <div class="p-6.5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4.5">
                        <x-label for="alnacer_peso" value="{{ 'Peso al nacer' }}" />
                        <x-input wire:model="alnacer_peso" id="alnacer_peso" type="text" />
                        <x-input-error for="alnacer_peso" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>

                    <div class="mb-4.5">
                        <x-label for="alnacer_talla" value="{{ 'Talla' }}" />
                        <x-input wire:model="alnacer_talla" id="alnacer_talla" type="text" required  />
                        <x-input-error for="alnacer_talla" class="mt-2" />
                    </div>

                    
                    <div class="mb-4.5">
                        <x-label for="alnacer_testapgar_1" value="{{ 'Test de Apgar' }}" />
                        <x-input wire:model="alnacer_testapgar_1" id="alnacer_testapgar_1" type="text" required  />
                        <x-input-error for="alnacer_testapgar_1" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="alnacer_testapgar_5" value="{{ 'Test de Apgar a los 5min' }}" />
                        <x-input wire:model="alnacer_testapgar_5" id="alnacer_testapgar_5" type="text" />
                        <x-input-error for="alnacer_testapgar_5" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="alnacer_obs" value="{{ 'Alguna Observación' }}" />
                        <x-input wire:model="alnacer_obs" id="alnacer_obs" type="text" />
                        <x-input-error for="alnacer_obs" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="alnacer_tiempog" value="{{ 'Tiempo de gestación en semanas' }}" />
                        <x-input wire:model="alnacer_tiempog" id="alnacer_tiempog" type="text" />
                        <x-input-error for="alnacer_tiempog" class="mt-2" />
                    </div>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Prematuro?</legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="alnacer_prematuro" name="alnacer_prematuro" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="alnacer_prematuro" name="alnacer_prematuro" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="alnacer_prematuro" class="mt-2" />
                        </div>
                    </fieldset>

                    <div class="mb-4.5">
                        <x-label for="alnacer_prematuro_mes" value="{{ '¿Prematuro de cuantos meses?' }}" />
                        <x-input wire:model="alnacer_prematuro_mes" id="alnacer_prematuro_mes" type="text" />
                        <x-input-error for="alnacer_prematuro_mes" class="mt-2" />
                    </div>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">Alimentación: Pecho  </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="alnacer_pecho" name="alnacer_pecho" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="alnacer_pecho" name="alnacer_pecho" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="alnacer_pecho" class="mt-2" />
                        </div>
                    </fieldset>

                    <div class="mb-4.5">
                        <x-label for="alnacer_pecho_tiempo" value="{{ '¿Cuánto tiempo?' }}" />
                        <x-input wire:model="alnacer_pecho_tiempo" id="alnacer_pecho_tiempo" type="text" />
                        <x-input-error for="alnacer_pecho_tiempo" class="mt-2" />
                    </div>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Otro tipo de alimentación?  </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="alnacer_otro" name="alnacer_otro" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="alnacer_otro" name="alnacer_otro" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="alnacer_otro" class="mt-2" />
                        </div>
                    </fieldset>

                    <div class="mb-4.5">
                        <x-label for="alnacer_otro_tiempo" value="{{ '¿Cuánto tiempo?' }}" />
                        <x-input wire:model="alnacer_otro_tiempo" id="alnacer_otro_tiempo" type="text" />
                        <x-input-error for="alnacer_otro_tiempo" class="mt-2" />
                    </div>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Uso de biberón?</legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="alnacer_biberon" name="alnacer_biberon" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="alnacer_biberon" name="alnacer_biberon" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="alnacer_biberon" class="mt-2" />
                        </div>
                    </fieldset>

                    <div class="mb-4.5">
                        <x-label for="alnacer_biberon_tiempo" value="{{ '¿Cuándo dejó de usar biberón? ' }}" />
                        <x-input wire:model="alnacer_biberon_tiempo" id="alnacer_biberon_tiempo" type="text" />
                        <x-input-error for="alnacer_biberon_tiempo" class="mt-2" />
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
