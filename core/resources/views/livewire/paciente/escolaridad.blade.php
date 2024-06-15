<div>
    <x-form-section submit="save">
        <x-slot name="title">
            {{ 'Actividasdes escolares'}}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Realizó maternal y jardín ?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="maternal_jardin" name="maternal_jardin" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="maternal_jardin" name="maternal_jardin" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="maternal_jardin" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="maternal_jardin_edad" value="{{ '¿Desde qué edad?' }}" />
                    <x-input wire:model="maternal_jardin_edad" id="maternal_jardin_edad" type="text" />
                    <x-input-error for="maternal_jardin_edad" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="maternal_jardin_sentir" value="{{ '¿Recuerda cómo se sentía en el nivel inicial? ' }}" />
                    <x-input wire:model="maternal_jardin_sentir" id="maternal_jardin_sentir" type="text" />
                    <x-input-error for="maternal_jardin_sentir" class="mt-2" />
                </div>
{{-- pre escolar --}}
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Realizó preescolar?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="prescolar" name="prescolar" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="prescolar" name="prescolar" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="prescolar" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="prescolar_edad" value="{{ '¿Desde qué edad?' }}" />
                    <x-input wire:model="prescolar_edad" id="prescolar_edad" type="text" />
                    <x-input-error for="prescolar_edad" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="prescolar_sentir" value="{{ '¿Recuerda cómo se sentía en el nivel preescolar? ' }}" />
                    <x-input wire:model="prescolar_sentir" id="prescolar_sentir" type="text" />
                    <x-input-error for="prescolar_sentir" class="mt-2" />
                </div>
{{-- fin pre escolar --}}
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Presentó alguna conducta llamativa en el nivel inicial?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="cond_nivel_inicial" name="cond_nivel_inicial" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="cond_nivel_inicial" name="cond_nivel_inicial" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="cond_nivel_inicial" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="cond_nivel_inicial_desc" value="{{ 'Describa' }}" />
                    <x-input wire:model="cond_nivel_inicial_desc" id="cond_nivel_inicial_desc" type="text" />
                    <x-input-error for="cond_nivel_inicial_desc" class="mt-2" />
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Presentó alguna conducta llamativa en el nivel prescolar? </legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="cond_prescolar" name="cond_prescolar" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="cond_prescolar" name="cond_prescolar" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="cond_prescolar" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="cond_prescolar_desc" value="{{ 'Describa' }}" />
                    <x-input wire:model="cond_prescolar_desc" id="cond_prescolar_desc" type="text" />
                    <x-input-error for="cond_prescolar_desc" class="mt-2" />
                </div>


                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿En la actualidad le agrada su colegio ?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="agrada_colegio" name="agrada_colegio" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="agrada_colegio" name="agrada_colegio" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="agrada_colegio" class="mt-2" />
                    </div>
                </fieldset>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Le agradan sus compañeros/as?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="agrada_compa" name="agrada_compa" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="agrada_compa" name="agrada_compa" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="agrada_compa" class="mt-2" />
                    </div>
                </fieldset>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Es acompañado/a en sus tareas escolares en casa ?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="acompa_tescolar" name="acompa_tescolar" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="acompa_tescolar" name="acompa_tescolar" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="acompa_tescolar" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="acompa_tescolar_como" value="{{ '¿Cómo? ' }}" />
                    <x-input wire:model="acompa_tescolar_como" id="acompa_tescolar_como" type="text" />
                    <x-input-error for="acompa_tescolar_como" class="mt-2" />
                </div>

                <div class="flex justify-center gap-4">
                    <x-button type="submit" >
                        {{ 'Guardar' }}
                    </x-button>    
                </div>                
                <x-message> {{ 'Registro Actualizado!' }}  </x-message>
                {{--  --}}
            </div>
        </div>

    </x-form-section>
</div>
