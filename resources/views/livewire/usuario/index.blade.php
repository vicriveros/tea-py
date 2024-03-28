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
                    <x-th text="Nombre" />
                    <x-th text="Email" />
                    <x-th text="Rol" />
                    <x-th text="Editar" />
                </tr>
            </thead>

            <tbody>
                @foreach ($usuarios as $usuario)
                    <tr wire:key="{{ $usuario->id }}">
                        <x-td> {{ $usuario->name }} </x-td>
                        <x-td> {{ $usuario->email }} </x-td>
                        <x-td> {{ $usuario->roles->pluck('name')[0] ?? '' }} </x-td>
                        <x-td>
                            <a href="{{ route('usuario.edit', $usuario->id) }}"> 
                                <i class="fa-solid fa-pen-to-square text-xl mx-2 text-primary"></i>
                            </a>
                        </x-td>                        
                    </tr>
                @endforeach
            </tbody>

        </x-table>

    </x-content-section>

</div>