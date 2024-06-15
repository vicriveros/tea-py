<div>
    <x-form-section submit="save">
            <x-slot name="title">
                {{ 'Rutinas' }}
            </x-slot>

            <div class="p-6.5">
                <div class="mb-4.5">
                    <x-label for="hab_obs" value="{{ 'A CONTINUACION DESCRIBA CÓMO SU HIJO/A REALIZA CADA RUTINA DEL DIA A DIA Y CON QUIÉN LA O LAS REALIZA' }}" />
                    <textarea wire:model="hab_obs" id="hab_obs" rows="4" cols="50" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter'"> </textarea>
                    <x-input-error for="hab_obs" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4.5">
                        <x-label for="acostar_noche" value="{{ 'A qué hora se acuesta por la noche?' }}" />
                        <x-input wire:model="acostar_noche" id="acostar_noche" type="text" />
                        <x-input-error for="acostar_noche" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Presenta alteraciones del sueño?</legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="alter_sueno" name="alter_sueno" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="alter_sueno" name="alter_sueno" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="alter_sueno" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Cómo duerme? Tranquilo/a </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="duerme_tran" name="duerme_tran" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="duerme_tran" name="duerme_tran" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="duerme_tran" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">Se impacienta al ir a dormir </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="impa_dormir" name="impa_dormir" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="impa_dormir" name="impa_dormir" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="impa_dormir" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">Se mueve constantemente en la cama antes de dormir </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="mueve_ant_dormir" name="mueve_ant_dormir" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="mueve_ant_dormir" name="mueve_ant_dormir" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="mueve_ant_dormir" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Se despierta de madrugada? </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="despierta_madru" name="despierta_madru" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="despierta_madru" name="despierta_madru" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="despierta_madru" class="mt-2" />
                        </div>
                    </fieldset>

                    <div class="mb-4.5">
                        <x-label for="despierta_madru_hora" value="{{ '¿A qué hora por lo general?' }}" />
                        <x-input wire:model="despierta_madru_hora" id="despierta_madru_hora" type="text"   />
                        <x-input-error for="despierta_madru_hora" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="despierta_hacer" value="{{ 'En el caso que se despierta, ¿Qué suelen hacer? ' }}" />
                        <x-input wire:model="despierta_hacer" id="despierta_hacer" type="text" />
                        <x-input-error for="despierta_hacer" class="mt-2" />
                    </div>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Se dirige al baño? </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="dirige_bano" name="dirige_bano" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="dirige_bano" name="dirige_bano" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="dirige_bano" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Coopera con su higienización? </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="coopera_hig" name="coopera_hig" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="coopera_hig" name="coopera_hig" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="coopera_hig" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Se higieniza?</legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="higieniza" name="higieniza" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="higieniza" name="higieniza" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="higieniza" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Se higieniza?</legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="higieniza" name="higieniza" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="higieniza" name="higieniza" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="higieniza" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Se desviste? </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="desviste" name="desviste" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="desviste" name="desviste" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="desviste" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Se viste? </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="seviste" name="seviste" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="seviste" name="seviste" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="seviste" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Usa pañales?</legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="panales" name="panales" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="panales" name="panales" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="panales" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Elige su ropa? </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="elige_ropa" name="elige_ropa" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="elige_ropa" name="elige_ropa" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="elige_ropa" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Se le ayuda la mayor parte? </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="ayuda_parte" name="ayuda_parte" type="radio" value="0" checked/>
                                NO
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="ayuda_parte" name="ayuda_parte" type="radio" value="1" />
                                SI
                            </label>
                            <x-input-error for="ayuda_parte" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Cómo define su apetito?  </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="define_apetito" name="define_apetito" type="radio" value="0" checked/>
                                Inapetente 
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="define_apetito" name="define_apetito" type="radio" value="1" />
                                Apetente 
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="define_apetito" name="define_apetito" type="radio" value="2" />
                                Muy Apetente 
                            </label>
                            <x-input-error for="define_apetito" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">¿Utiliza cubiertos? </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="cubiertos" name="cubiertos" type="radio" value="0" checked/>
                                NO 
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="cubiertos" name="cubiertos" type="radio" value="1" />
                                SI 
                            </label>
                            <x-input-error for="cubiertos" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">Come con la mano </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="comer_mano" name="comer_mano" type="radio" value="0" checked/>
                                NO 
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="comer_mano" name="comer_mano" type="radio" value="1" />
                                SI 
                            </label>
                            <x-input-error for="comer_mano" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">Tira la comida  </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="tira_comida" name="tira_comida" type="radio" value="0" checked/>
                                NO 
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="tira_comida" name="tira_comida" type="radio" value="1" />
                                SI 
                            </label>
                            <x-input-error for="tira_comida" class="mt-2" />
                        </div>
                    </fieldset>

                    <fieldset class="mb-4.5 flex flex-col gap-2">
                        <div>
                            <legend class="mb-3 block text-sm font-medium text-black">Juega con la comida </legend>
                        </div>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input wire:model="juega_comida" name="juega_comida" type="radio" value="0" checked/>
                                NO 
                            </label>
                            <label class="flex items-center gap-2">
                                <input wire:model="juega_comida" name="juega_comida" type="radio" value="1" />
                                SI 
                            </label>
                            <x-input-error for="juega_comida" class="mt-2" />
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