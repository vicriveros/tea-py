<div>
    <x-form-section submit="save">
        <x-slot name="title">
            {{ 'Descripcion de actividades' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="mb-4.5">
                    <x-label for="hora_actividad" value="{{ 'Horario de actividades' }}" />
                    <x-input wire:model="hora_actividad" id="hora_actividad" type="text" />
                    <x-input-error for="hora_actividad" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="actividad_prefe" value="{{ 'Actividad preferida' }}" />
                    <x-input wire:model="actividad_prefe" id="actividad_prefe" type="text" />
                    <x-input-error for="actividad_prefe" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="que_juega" value="{{ '¿A que juega?' }}" />
                    <x-input wire:model="que_juega" id="que_juega" type="text" />
                    <x-input-error for="que_juega" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="como_juega" value="{{ '¿Como juega?' }}" />
                    <x-input wire:model="como_juega" id="como_juega" type="text" />
                    <x-input-error for="como_juega" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="actividad_proge" value="{{ '¿Qué actividades recreativas comparte con sus progenitores?' }}" />
                    <x-input wire:model="actividad_proge" id="actividad_proge" type="text" />
                    <x-input-error for="actividad_proge" class="mt-2" />
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Hace algún deporte u otra actividad?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="deporte" name="deporte" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="deporte" name="deporte" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="deporte" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="deporte_cual" value="{{ '¿Cual/es? ' }}" />
                    <x-input wire:model="deporte_cual" id="deporte_cual" type="text" />
                    <x-input-error for="deporte_cual" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="deporte_donde" value="{{ '¿Donde? ' }}" />
                    <x-input wire:model="deporte_donde" id="deporte_donde" type="text" />
                    <x-input-error for="deporte_donde" class="mt-2" />
                </div>

                <div class="flex justify-center gap-4">
                    <x-button type="submit" >
                        {{ 'Guardar' }}
                    </x-button>    
                </div>                
                <x-message> {{ 'Registro Actualizado!' }}  </x-message>

            </div><!--end grid -->
        </div>
    </x-form-section>
</div>
