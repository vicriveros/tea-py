<div>
    <x-form-section submit="save_hora">
        <x-slot name="title">
            {{ 'Establecer Horarios' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="mb-4.5">
                        <x-label for="consultorio_id" value="{{ 'Consultorio' }}" />
                        <select wire:model="consultorio_id" id="consultorio_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            <option value="0">Seleccione</option>
                            @foreach($consultorios as $cons)
                                <option value="{{ $cons->id }}">{{ $cons->nombre }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="dia" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>
                    <div class="mb-4.5">
                        <x-label for="dia" value="{{ 'Día' }}" />
                        <select wire:model="dia" id="dia" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">
                            <option value="0">Seleccione</option>
                            @foreach($dias as $key => $value)
                                <option value="{{ $key }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <x-input-error for="dia" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>

                    <div class="mb-4.5">
                        <x-label for="fecha_inicio" value="{{ 'Fecha Inicial. Ej: año-mes-dia' }}" />
                        <x-input wire:model="fecha_inicio" id="fecha_inicio" type="date" required  placeholder="2000-10-24" />

                        <x-input-error for="fecha_inicio" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>
                    
                    <div class="mb-4.5">
                        <x-label for="fecha_final" value="{{ 'Fecha Final. Ej: año-mes-dia' }}" />
                        <x-input wire:model="fecha_final" id="fecha_final" type="date" required  placeholder="2000-10-24" />

                        <x-input-error for="fecha_final" class="mt-2">
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
                                <x-th> Consultorio </x-th>
                                <x-th> Dia </x-th>
                                <x-th> Hora Ini</x-th>
                                <x-th> Hora Fin </x-th>
                                <x-th>  </x-th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($me_horarios as $hora)
                                <tr wire:key="{{ $hora->id }}">
                                    <x-td> {{App\Livewire\Medico\Horario::getConsultorio($hora->consultorio_id) }}</x-td>
                                    <x-td> {{App\Livewire\Medico\Horario::getDiaNombre($hora->dia) }} </x-td>
                                    <x-td> {{ $hora->hora_desde }} </x-td>
                                    <x-td> {{ $hora->hora_hasta }}</x-td>
                                    <x-td> 
                                        <x-danger-button wire:click="delete_hora({{ $hora->id }})" wire:confirm="Seguro que desea eliminar este registro?">
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
