<div>
    <x-page-title>
        <x-slot name="title"> {{ 'Agenda' }} </x-slot>
    </x-page-title>

    <x-form-section submit="buscar">
        <x-slot name="title">
            {{ 'Listado de Citas' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                <div class="mb-4.5">
                    <x-label for="consultorio" value="{{ 'Consultorio' }}" />
                    <select wire:model="consultorio" id="consultorio" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                        <option value="0">Seleccione</option>
                        @foreach($consultorios as $cons)
                            <option value="{{ $cons->id }}">{{ $cons->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="consultorio" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="especialidad" value="{{ 'Especialidad' }}" />
                    <select wire:model="especialidad" id="especialidad" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                        <option value="0">Seleccione</option>
                        @foreach($especialidades as $esp)
                            <option value="{{ $esp->id }}">{{ $esp->nombre }}</option>
                        @endforeach                        
                    </select>
                    <x-input-error for="especialidad" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="profesional" value="{{ 'Profesional' }}" />
                    <select wire:model="profesional" id="profesional" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                        <option value="0">Seleccione</option>
                        @foreach($profesionales as $prof)
                            <option value="{{ $prof->id }}">{{ $prof->persona->nombre. ' ' .$prof->persona->apellido }}</option>
                        @endforeach                          
                    </select>
                    <x-input-error for="profesional" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <div class="mb-4.5">
                    <x-label for="fecha_desde" value="{{ 'Fecha Desde' }}" />
                    <x-input wire:model="fecha_desde" id="fecha_desde" type="date" />
                    <x-input-error for="fecha_desde" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="fecha_hasta" value="{{ 'Fecha Hasta' }}" />
                    <x-input wire:model="fecha_hasta" id="fecha_hasta" type="date" />
                    <x-input-error for="fecha_hasta" class="mt-2" />
                </div>
            
            </div><!--end grid -->

            <div class="flex justify-center gap-4">
                    <button type="submit" class="flex justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90 place-self-end"><span><i class="fa-solid fa-magnifying-glass"></i> Buscar</span></button>


                    <button wire:click="limpiar" class="flex justify-center rounded bg-black p-3 font-medium text-gray hover:bg-opacity-90 place-self-end"><span><i class="fa-solid fa-broom"></i> Limpiar Busqueda</span></button>  

                    <button wire:click="limpiar" class="flex justify-center rounded bg-meta-3 p-3 font-medium text-gray hover:bg-opacity-90 place-self-end"><span><i class="fa-solid fa-download"></i> Descargar</span></button> 
                    
                </div>    

            <div class="overflow-x-auto mt-8">
                <table class="items-center bg-transparent w-full border-collapse ">
                    <thead>
                        <tr>
                            <x-th> Profesional </x-th>
                            <x-th> Paciente </x-th>
                            <x-th> Fecha</x-th>
                            <x-th> Hora</x-th>
                            <x-th> Obs.</x-th>
                            <x-th> Consultorio</x-th>
                            <x-th> Especialidad</x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agendamientos as $cita)
                            <tr wire:key="{{ $cita->id }}">
                                <x-td> {{ $cita->medico_nombre }} </x-td>                                                     
                                <x-td> {{ $cita->paciente_nombre }} </x-td>                                                     
                                <x-td> {{ $cita->fecha }} </x-td>                                                     
                                <x-td> {{ $cita->hora_desde }} </x-td>                                                     
                                <x-td> {{ $cita->obs }} </x-td>                                                     
                                <x-td> {{ $cita->consultorio }} </x-td>                                                     
                                <x-td> {{ $cita->especialidad }} </x-td>                                                     
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div><!--end table -->

        </div>
    </x-form-section>

</div>
