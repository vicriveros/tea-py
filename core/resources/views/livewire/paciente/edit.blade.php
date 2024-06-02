<div>

    <x-page-title>
        <x-slot name="title"> {{ 'Pacientes' }} </x-slot>
    </x-page-title>

    <x-colapsable title="{{ 'DATOS DE IDENTIFICACIÓN PERSONAL' }}" id="1">
        <x-form-section submit="save">
            <x-slot name="title">
                {{ 'Datos Personales' }}
            </x-slot>

            <div class="p-6.5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="mb-4.5">
                        <x-label for="name" value="{{ 'Nombre' }}" />
                        <x-input wire:model="nombre" id="name" type="text" required placeholder="Nombre" />
                        <x-input-error for="nombre" class="mt-2">
                            {{ 'Este campo es requerido.' }}
                        </x-input-error>
                    </div>

                    <div class="mb-4.5">
                        <x-label for="apellido" value="{{ 'Apellido' }}" />
                        <x-input wire:model="apellido" id="apellido" type="text" required  placeholder="Apellido" />
                        <x-input-error for="apellido" class="mt-2" />
                    </div>

                    
                    <div class="mb-4.5">
                        <x-label for="documento" value="{{ 'Nro de Documento' }}" />
                        <x-input wire:model="documento" id="documento" type="text" required  placeholder="Documento" />
                        <x-input-error for="documento" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="fecha_nacimiento" value="{{ 'Fecha Nacimiento. Ej: año-mes-dia' }}" />
                        <x-input wire:model="fecha_nacimiento" id="fecha_nacimiento" type="text" required  placeholder="2000-10-24" />
                        <x-input-error for="fecha_nacimiento" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="direccion" value="{{ 'Dirección' }}" />
                        <x-input wire:model="direccion" id="direccion" type="text"  placeholder="Dirección" />
                        <x-input-error for="direccion" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="barrio" value="{{ 'Barrio' }}" />
                        <x-input wire:model="barrio" id="barrio" type="text"  placeholder="Barrio" />
                        <x-input-error for="barrio" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="telefono" value="{{ 'Teléfono' }}" />
                        <x-input wire:model="telefono" id="telefono" type="text" required  placeholder="Teléfono" />
                        <x-input-error for="telefono" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="mail" value="{{ 'E-mail' }}" />
                        <x-input wire:model="mail" id="mail" type="text" required  placeholder="E-mail" />
                        <x-input-error for="mail" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="colegio" value="{{ 'Colegio o Institución Educativa' }}" />
                        <x-input wire:model="colegio" id="colegio" type="text" required  placeholder="Colegio o Institución Educativa" />
                        <x-input-error for="colegio" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="grado" value="{{ 'Grado/Turno' }}" />
                        <x-input wire:model="grado" id="grado" type="text" required  placeholder="Grado/Turno" />
                        <x-input-error for="grado" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="diag_nombres" value="{{ 'Diagnóstico' }}" />
                        <x-input wire:model="diag_nombres" id="diag_nombres" type="text" required  placeholder="Diagnóstico" />
                        <x-input-error for="diag_nombres" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="diag_edad" value="{{ 'Diagnóstico ¿a qué edad?' }}" />
                        <x-input wire:model="diag_edad" id="diag_edad" type="text" required  placeholder="Diagnóstico ¿a qué edad?" />
                        <x-input-error for="diag_edad" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="diag_responsable" value="{{ 'Responsable del diagnóstico' }}" />
                        <x-input wire:model="diag_responsable" id="diag_responsable" type="text" required  placeholder="Responsable del diagnóstico" />
                        <x-input-error for="diag_responsable" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="diag_datos" value="{{ 'Responsables de la Administración de los datos' }}" />
                        <x-input wire:model="diag_datos" id="diag_datos" type="text" required  placeholder="Responsables de la Administración de los datos" />
                        <x-input-error for="diag_datos" class="mt-2" />
                    </div>

                    <div class="mb-4.5">
                        <x-label for="centro_programa" value="{{ 'Centro o Programa' }}" />
                        <x-input wire:model="centro_programa" id="centro_programa" type="text" required  placeholder="Centro o Programa" />
                        <x-input-error for="centro_programa" class="mt-2" />
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
    </x-colapsable>

    <x-colapsable title="{{ 'DATOS DEL GRUPO FAMILIAR' }}" id="2">
        <livewire:paciente.grupo-familiar pacienteid="{{ $paciente->id }}"/>
    </x-colapsable>

    <x-colapsable title="{{ 'ANTECEDENTES PRENATALES' }}" id="3">
        <livewire:paciente.prenatales pacienteid="{{ $paciente->id }}"/>
    </x-colapsable>

    <x-colapsable title="{{ 'CARACTERÍSTICAS AL NACER ' }}" id="4">
        <livewire:paciente.al-nacer pacienteid="{{ $paciente->id }}"/>
    </x-colapsable>

    <x-colapsable title="{{ 'ASPECTOS DE SALUD' }}" id="5">
        <livewire:paciente.aspectos pacienteid="{{ $paciente->id }}"/>
    </x-colapsable>

</div>
