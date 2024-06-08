<div>
<x-form-section submit="save_general">
        <x-slot name="title">
            {{ 'Datos Generales' }}
        </x-slot>

        <div class="p-6.5">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Padres separados?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="gfam_padres_seprados" name="gfam_padres_seprados" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="gfam_padres_seprados" name="gfam_padres_seprados" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="gfam_padres_seprados" class="mt-2" />
                    </div>
                </fieldset>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">¿Con quien vive el niño/a?</legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="gfam_vive" name="gfam_vive" type="radio" value="1" checked/>
                            Ambos
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="gfam_vive" name="gfam_vive" type="radio" value="2" />
                            Padre
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="gfam_vive" name="gfam_vive" type="radio" value="3" />
                            Madre
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="gfam_vive" name="gfam_vive" type="radio" value="4" />
                            Otro
                        </label>
                        <x-input-error for="gfam_vive" class="mt-2" />
                    </div>
                </fieldset>

                <div class="mb-4.5">
                    <x-label for="gfam_vive_otros" value="{{ 'Si marco otro, nombrar quien' }}" />
                    <x-input wire:model="gfam_vive_otros" id="gfam_vive_otros" type="text" />
                    <x-input-error for="gfam_vive_otros" class="mt-2" />
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

    <!-- parentesco -->
    <x-form-section submit="save">
        <x-slot name="title">
            {{ 'Personas que viven en la casa.' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="parentesco" value="{{ 'Parentesco' }}" />
                    <select wire:model="parentesco_id" id="parentesco" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($parentesco as $par)
                            <option value="{{ $par->id }}">{{ $par->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="parentesco_id" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

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
                    <x-label for="documento" value="{{ 'Documento' }}" />
                    <x-input wire:model="documento" id="documento" type="text" required  placeholder="Documento" />
                    <x-input-error for="documento" class="mt-2" />
                </div>

                <div class="mb-4.5">
                    <x-label for="fecha_nacimiento" value="{{ 'Fecha Nacimiento' }}" />
                    <x-input wire:model="fecha_nacimiento" id="fecha_nacimiento" type="text" required  placeholder="Fecha Nacimiento" />
                    <x-input-error for="fecha_nacimiento" class="mt-2" />
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
                            <x-th> Parentesco </x-th>
                            <x-th> Nombre </x-th>
                            <x-th> </x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grupo_fam as $gfam)
                            <tr wire:key="{{ $gfam->id }}">
                                <x-td> {{ App\Livewire\Paciente\GrupoFamiliar::getParentescoName($gfam->parentesco_id) }} </x-td>
                                <x-td> {{ App\Livewire\Paciente\GrupoFamiliar::getPersonaName($gfam->persona_id) }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete({{ $gfam->id }})" wire:confirm="Seguro que desea eliminar este usario?">
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
