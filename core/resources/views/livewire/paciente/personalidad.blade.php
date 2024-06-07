<div>
<x-form-section submit="save_asp">
        <x-slot name="title">
            {{ 'Aspectos del Paciente' }}
        </x-slot>

        <div class="p-6.5">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            
            <div>
                <div class="mb-4.5">
                    <x-label for="aspecto_id" value="{{ 'Aspectos Emocionales' }}" />
                    <select wire:model="aspecto_id" id="aspecto_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($aspectos1 as $asp)
                            <option value="{{ $asp->id }}">{{ $asp->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="aspecto_id" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
            
                <x-message> {{ 'Registro Actualizado!' }}  </x-message>

                <div class="flex justify-end gap-4">
                    <x-button type="submit" >
                        {{ 'Agregar' }}
                    </x-button>    
                </div>

                <div class="mb-4.5">
                    <x-label for="aspecto_id" value="{{ 'Aspectos Sociales' }}" />
                    <select wire:model="aspecto_id" id="aspecto_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($aspectos2 as $asp)
                            <option value="{{ $asp->id }}">{{ $asp->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="aspecto_id" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
            
                <div class="flex justify-end gap-4">
                    <x-button type="submit" >
                        {{ 'Agregar' }}
                    </x-button>    
                </div>

                <div class="mb-4.5">
                    <x-label for="aspecto_id" value="{{ 'Aspectos Habilidades Sociales' }}" />
                    <select wire:model="aspecto_id" id="aspecto_id" class="w-full rounded border-[1.5px] border-stroke bg-transparent px-5 py-3 font-normal text-black outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-whiter">                         
                       <option value="0">Seleccione</option>
                        @foreach($aspectos3 as $asp)
                            <option value="{{ $asp->id }}">{{ $asp->nombre }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="aspecto_id" class="mt-2">
                        {{ 'Este campo es requerido.' }}
                    </x-input-error>
                </div>
            
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
                            <x-th> Aspectos </x-th>
                            <x-th> Tipo de Aspecto</x-th>
                            <x-th> </x-th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pa_aspectos as $asp)
                            <tr wire:key="{{ $asp->id }}">
                                <x-td> {{App\Livewire\Paciente\Personalidad::getAspectoName($asp->aspecto_id) }} </x-td>
                                <x-td> {{App\Livewire\Configuraciones\Aspectos::getTipo($asp->tipo_aspecto) }} </x-td>
                                <x-td> 
                                    <x-danger-button wire:click="delete_asp({{ $asp->id }})" wire:confirm="Seguro que desea eliminar este registro?">
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
