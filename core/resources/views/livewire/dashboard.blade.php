<div>
    @switch(Auth::user()->roles->pluck('name')[0])
        @case('Profesional')
            <livewire:dashboard.medico />
            @break
        @case('Paciente')
            <livewire:dashboard.paciente />
            @break
        @default
            <livewire:agendamiento.consultorios />
    @endswitch
</div>