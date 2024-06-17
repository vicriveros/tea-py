<div>
    <x-form-section submit="save_conduc">
        <x-slot name="title">
            {{ 'Psicosociales/conductuales' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="conducta_id" value="{{ 'Conductas' }}" />
                    <select wire:model="conducta_id" id="conducta_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($conductuales as $conduc)
                            <option value="{{ $conduc->id }}">{{ $conduc->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="conducta_id" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">Presentó en el PASADO </legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="pasado" name="pasado" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="pasado" name="pasado" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="pasado" class="mt-2" />
                    </div>
                </fieldset>
                
                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">Presenta AHORA </legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="ahora" name="ahora" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="ahora" name="ahora" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="ahora" class="mt-2" />
                    </div>
                </fieldset>
            
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
                            <x-th> Nombre </x-th>
                            <x-th> PASADO </x-th>
                            <x-th> AHORA </x-th>
                            <x-th> </x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pa_conductuales as $conduc)
                            <tr wire:key="{{ $conduc->id }}">
                                <x-td> {{App\Livewire\Paciente\ConductualesEmocionales::getConductasName($conduc->conducta_id) }} </x-td>
                                <x-td> {{ ($conduc->pasado == 1) ? 'SI' : 'NO' }} </x-td>
                                <x-td> {{ ($conduc->ahora == 1) ? 'SI' : 'NO'  }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete_conduc({{ $conduc->id }})" wire:confirm="Seguro que desea eliminar este registro?">
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

    <x-form-section submit="save_emo">
        <x-slot name="title">
            {{ 'Emocionales' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="econducta_id" value="{{ 'Conductas' }}" />
                    <select wire:model="econducta_id" id="econducta_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($emocionales as $conduc)
                            <option value="{{ $conduc->id }}">{{ $conduc->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="econducta_id" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>

                <fieldset class="mb-4.5 flex flex-col gap-2">
                    <div>
                        <legend class="mb-3 block text-sm font-medium text-black">Presenta </legend>
                    </div>
                    <div class="flex gap-6">
                        <label class="flex items-center gap-2">
                            <input wire:model="presenta" name="presenta" type="radio" value="0" checked/>
                            NO
                        </label>
                        <label class="flex items-center gap-2">
                            <input wire:model="presenta" name="presenta" type="radio" value="1" />
                            SI
                        </label>
                        <x-input-error for="presenta" class="mt-2" />
                    </div>
                </fieldset>
                
                <div class="mb-4.5">
                    <x-label for="presenta_emo" value="{{ 'Presenta esta emoción en:' }}" />
                    <x-input wire:model="presenta_emo" id="presenta_emo" type="text" />
                    <x-input-error for="presenta_emo" class="mt-2" />
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
                            <x-th> Nombre </x-th>
                            <x-th> Presenta </x-th>
                            <x-th> Presenta emoción en: </x-th>
                            <x-th> </x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pa_emocionales as $conduc)
                            <tr wire:key="{{ $conduc->id }}">
                                <x-td> {{App\Livewire\Paciente\ConductualesEmocionales::getConductasName($conduc->conducta_id) }} </x-td>
                                <x-td> {{ ($conduc->presenta == 1) ? 'SI' : 'NO' }} </x-td>
                                <x-td> {{ $conduc->presenta_emo }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete_emo({{ $conduc->id }})" wire:confirm="Seguro que desea eliminar este registro?">
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
