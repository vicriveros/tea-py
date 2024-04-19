<div>

    <x-page-title>
        <x-slot name="title"> {{ 'Usuarios' }} </x-slot>
    </x-page-title>

    <x-content-section>
        <x-slot name="title">
            {{ 'Lista de Usuarios' }}
        </x-slot>

        <x-table>
            <thead>
                <tr>
                    <x-th sortable="true" column="name" :sortCol="$sortCol" :sortAsc="$sortAsc">
                        Nombre
                    </x-th>
                    <x-th sortable="true" column="email" :sortCol="$sortCol" :sortAsc="$sortAsc">
                        Email
                    </x-th>
                    <x-th> Rol </x-th>
                    <x-th> Editar </x-th>
                </tr>
            </thead>

            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr wire:key="{{ $usuario->id }}">
                        <x-td> {{ $usuario->name }} </x-td>
                        <x-td> {{ $usuario->email }} </x-td>
                        <x-td> {{ App\Livewire\Usuario\Index::getUserRole($usuario->id) }} </x-td>
                        <x-td>
                            @can('manejar usuarios')
                                <a href="{{ route('usuario.edit', $usuario->id) }}"> 
                                    <i class="fa-solid fa-pen-to-square text-xl mx-2 text-primary"></i>
                                </a>
                            @endcan
                        </x-td>                        
                    </tr>
                @endforeach
            </tbody>

        </x-table>
        {{ $usuarios->links() }}
    </x-content-section>

</div>