<div>

    <x-page-title>
        <x-slot name="title"> {{ 'Pacientes' }} </x-slot>
    </x-page-title>

    <x-content-section>
        <x-slot name="title">
            {{ 'Lista de Pacientes' }}
        </x-slot>

        <x-table>
            <x-slot name="botones">
                <a href="{{ route('persona.create') }}" class="flex justify-center rounded bg-primary p-3 font-medium text-gray hover:bg-opacity-90 place-self-end"> Agregar </a>
            </x-slot>
            <thead>
                <tr>
                    <x-th sortable="true" column="name" :sortCol="$sortCol" :sortAsc="$sortAsc">
                        Nombre
                    </x-th>
                    <x-th sortable="true" column="email" :sortCol="$sortCol" :sortAsc="$sortAsc">
                        Apellido
                    </x-th>
                    <x-th> Documento </x-th>
                    <x-th> Editar </x-th>
                </tr>
            </thead>

            <tbody>
                @foreach ($personas as $persona)
                    <tr wire:key="{{ $persona->id }}">
                        <x-td> {{ $persona->nombre }} </x-td>
                        <x-td> {{ $persona->apellido }} </x-td>
                        <x-td> {{ $persona->documento }} </x-td>
                        <x-td>
                            @can('editar paciente')
                                <a href="{{ route('persona.edit', $persona->id) }}"> 
                                    <i class="fa-solid fa-pen-to-square text-xl mx-2 text-primary"></i>
                                </a>
                            @endcan
                        </x-td>                        
                    </tr>
                @endforeach
            </tbody>

        </x-table>
        {{ $personas->links() }}
    </x-content-section>

</div>