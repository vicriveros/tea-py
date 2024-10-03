<div>

    <x-page-title>
        <x-slot name="title"> {{ 'Consultorios' }} </x-slot>
    </x-page-title>

    <x-content-section>
        <x-slot name="title">
            {{ 'Lista de Consultorios' }}
        </x-slot>

        <x-table>
            <x-slot name="botones">
                
            </x-slot>
            <thead>
                <tr>
                    <x-th sortable="true" column="name" :sortCol="$sortCol" :sortAsc="$sortAsc">
                        Nombre
                    </x-th>
                    <x-th> Calendario </x-th>
                </tr>
            </thead>

            <tbody>
                @foreach ($consultorios as $consultorio)
                    <tr wire:key="{{ $consultorio->id }}">
                        <x-td> {{ $consultorio->nombre }} </x-td>
                        <x-td>
                            <a href="{{ route('agendamiento.calendario', $consultorio->id) }}"> 
                                <i class="fa-solid fa-calendar-week text-xl mx-2 text-primary"></i> Ver Calendario
                            </a>
                        </x-td>                       
                    </tr>
                @endforeach
            </tbody>

        </x-table>
        {{ $consultorios->links() }}
    </x-content-section>

</div>
