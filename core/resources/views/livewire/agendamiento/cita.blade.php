<div>
    <x-form-section submit="save_cita">
        <x-slot name="title">
            {{ 'Cargar Cita' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div class="mb-4.5">
                        <p class="mb-3 block text-sm font-medium text-black">
                            Especialidad: {{ $especialidad_nombre}} </br>
                            Profesional: {{ $medico_nombres }} </br>
                            Fecha: {{ $fecha }}
                        </p>
                    </div>

                    <div class="mb-4.5">
                        <x-label for="paciente_id" value="{{ 'Paciente' }}" />
                        <livewire:components.autocomplete.paciente />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="hora_desde" value="{{ 'Hora desde' }}" />
                        <x-input wire:model="hora_desde" id="hora_desde" type="text" required  placeholder="10:00" />
                        <x-input-error for="hora_desde" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="hora_hasta" value="{{ 'Hora hasta' }}" />
                        <x-input wire:model="hora_hasta" id="hora_hasta" type="text" required  placeholder="18:00" />
                        <x-input-error for="hora_hasta" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="obs" value="{{ 'Observaciones' }}" />
                        <x-input wire:model="obs" id="obs" type="text" />

                        <x-input-error for="obs" class="mt-2">
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
        </div>   
    </x-form-section>

</div>