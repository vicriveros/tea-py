<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <h1 class="text-title-lg font-bold text-black text-center my-3">
                    Bienvenido a la aplicación TEA PY.
                </h1>
                <p class="text-blueGray-500 text-lg text-center my-3">
                    Para dar de alta a un paciente haga <a href="{{ route('paciente.create') }}" class="text-primary">click aqui.</a>
                </p>

            <x-content-section>
                <x-slot name="title">
                    {{ 'Mis Pacientes' }}
                </x-slot>
                <x-table>
                    <x-slot name="botones"> </x-slot>
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
                                    <a href="{{ route('paciente.edit', $persona->id) }}"> 
                                        <i class="fa-solid fa-pen-to-square text-xl mx-2 text-primary"></i>
                                    </a>
                                </x-td>                        
                            </tr>
                        @endforeach
                    </tbody>

                </x-table>
                {{ $personas->links() }}
            </x-content-section>

            </div>
        </div>
    </div>

</div>
