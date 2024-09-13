<div>
    <x-form-section submit="save_cita">
        <x-slot name="title">
            {{ 'Cargar Cita' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4.5">
                        <x-label for="consultorio_id" value="{{ 'Consultorio' }}" />
                        <select wire:model="consultorio_id" id="consultorio_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            <option value="0">Seleccione</option>
                            @foreach($consultorios as $cons)
                                <option value="{{ $cons->id }}">{{ $cons->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="consultorio_id" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>

                    <div class="mb-4.5">
                        <x-label for="especialidad_id" value="{{ 'Especialidad' }}" />
                        <select wire:model="especialidad_id" id="especialidad_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            <option value="0">Seleccione</option>
                            @foreach($especialidades as $esp)
                                <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="especialidad_id" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>

                    <div class="mb-4.5">
                        <x-label for="medico_id" value="{{ 'Profesional' }}" />
                        <select wire:model="medico_id" id="medico_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            <option value="0">Seleccione</option>
                            @foreach($medicos as $med)
                                <option value="{{ $med->id }}">{{ $med->persona->nombre .' '. $med->persona->apellido  }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="medico_id" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>

                    <div class="mb-4.5">
                        <x-label for="paciente_id" value="{{ 'Paciente' }}" />
                        <livewire:components.autocomplete.paciente />
                    </div>
                    
                    <div class="mb-4.5">
                        <x-label for="fecha" value="{{ 'Fecha' }}" />
                        <x-input wire:model="fecha" id="fecha" type="date" required />

                        <x-input-error for="fecha" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>

                    <div class="mb-4.5">
                        <x-label for="hora_desde" value="{{ 'Hora desde' }}" />
                        <x-input wire:model="hora_desde" id="hora_desde" type="time" required  placeholder="10:00" />
                        <x-input-error for="hora_desde" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="hora_hasta" value="{{ 'Hora hasta' }}" />
                        <x-input wire:model="hora_hasta" id="hora_hasta" type="time" required  placeholder="18:00" />
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
