<div>

    <x-form-section submit="save">
        <x-slot name="title">
            {{ 'Lenguaje Expresivo / Gestual' }}
        </x-slot>
        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="mb-4.5">
                    <x-label for="gorgeo" value="{{ 'Gorgeo' }}" />
                    <x-input wire:model="gorgeo" id="gorgeo" type="text" />
                    <x-input-error for="gorgeo" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="balbuceo" value="{{ 'Balbuceo' }}" />
                    <x-input wire:model="balbuceo" id="balbuceo" type="text" />
                    <x-input-error for="balbuceo" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="sonrisa_social" value="{{ 'Sonrisa social' }}" />
                    <x-input wire:model="sonrisa_social" id="sonrisa_social" type="text" />
                    <x-input-error for="sonrisa_social" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
    
                <div class="mb-4.5">
                    <x-label for="fija_mirada" value="{{ 'Fija la mirada' }}" />
                    <x-input wire:model="fija_mirada" id="fija_mirada" type="text" />
                    <x-input-error for="fija_mirada" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="com_no" value="{{ 'Comprension del No' }}" />
                    <x-input wire:model="com_no" id="com_no" type="text" />
                    <x-input-error for="com_no" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="prim_palabras" value="{{ '¿A qué edad dijo sus primeras palabras? ' }}" />
                    <x-input wire:model="prim_palabras" id="prim_palabras" type="text" />
                    <x-input-error for="prim_palabras" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="frases2_palabras" value="{{ 'Frases de dos palabras' }}" />
                    <x-input wire:model="frases2_palabras" id="frases2_palabras" type="text" />
                    <x-input-error for="frases2_palabras" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="ora_completa" value="{{ 'Oraciones completas' }}" />
                    <x-input wire:model="ora_completa" id="ora_completa" type="text" />
                    <x-input-error for="ora_completa" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="com_ordenes" value="{{ 'Comprende órdenes' }}" />
                    <x-input wire:model="com_ordenes" id="com_ordenes" type="text" />
                    <x-input-error for="com_ordenes" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="cum_ordenes" value="{{ 'Cumple órdenes' }}" />
                    <x-input wire:model="cum_ordenes" id="cum_ordenes" type="text" />
                    <x-input-error for="cum_ordenes" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="sis_com" value="{{ 'Sistema de comunicación que utiliza' }}" />
                    <x-input wire:model="sis_com" id="sis_com" type="text" />
                    <x-input-error for="sis_com" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Se expresa?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="se_expresa" name="se_expresa" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="se_expresa" name="se_expresa" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="se_expresa" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="se_expresa_como" value="{{ '¿Cómo se expresa? ' }}" />
                    <x-input wire:model="se_expresa_como" id="se_expresa_como" type="text" />
                    <x-input-error for="se_expresa_como" class="mt-2">
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
