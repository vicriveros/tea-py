<div>
    <x-page-title>
        <x-slot name="title"> {{ 'Calendario' }} </x-slot>
    </x-page-title>

    <x-content-section>
        <x-slot name="title">
            {{ 'Agenda del Consultorio: '.$consultorioNombre }}
        </x-slot>
    <div id="modal_container" x-data>
        <div 
        x-show="$store.modal.on" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 scale-90" 
        x-transition:enter-end="opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-300" 
        x-transition:leave-start="opacity-100 scale-100" 
        x-transition:leave-end="opacity-0 scale-90" 
        class="fixed z-9999 inset-0 flex items-center justify-center overflow-y-auto" aria-labelledby="modal-title" 
        role="dialog" 
        aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                
                <!-- Modal Background Overlay -->
                <div class="!fixed z-9998 !inset-0 !bg-gray-500 !bg-opacity-75 transition-opacity" aria-hidden="true" @click="$store.modal.toggle()"></div>

                <!-- Modal panel -->
                <div class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <!-- contenido del modal -->
                                <livewire:agendamiento.cita consultorio="{{ $consultorioid }}"/>
                            <!-- contenido del modal -->
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="$store.modal.toggle()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                        Cerrar
                        </button>
                    </div>
                </div> <!-- Modal panel -->
                
            </div>
        </div><!-- Modal -->
    </div> <!-- Modal Container-->

    <div id="modal_edit_container" x-data>
        <div 
        x-show="$store.edit.on" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 scale-90" 
        x-transition:enter-end="opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-300" 
        x-transition:leave-start="opacity-100 scale-100" 
        x-transition:leave-end="opacity-0 scale-90" 
        class="fixed z-9999 inset-0 flex items-center justify-center overflow-y-auto" aria-labelledby="modal-title" 
        role="dialog" 
        aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                
                <!-- Modal Background Overlay -->
                <div class="!fixed z-9998 !inset-0 !bg-gray-500 !bg-opacity-75 transition-opacity" aria-hidden="true" @click="$store.edit.toggle()"></div>

                <!-- Modal panel -->
                <div class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <!-- contenido del modal -->
                            <livewire:agendamiento.cita-editar />
                            <!-- contenido del modal -->
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="$store.edit.toggle()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                            Cerrar
                        </button>
                    </div>
                </div> <!-- Modal panel -->
                
            </div>
        </div><!-- Modal -->
    </div> <!-- Modal Edit Container-->

    <div id="calendar-container" wire:ignore>
            <div id="calendar"> </div>
    </div>
    </x-content-section>

    @assets
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.15/index.global.min.js'></script>
    @endassets

    @script
    <script> 
        Alpine.store('modal', {
            on: false,
            toggle() { this.on = ! this.on }
        });
        Alpine.store('edit', {
            on: false,
            toggle() { this.on = ! this.on }
        });

        var calendarEl = document.getElementById('calendar');
        let prof = @json($medicos_espe);
        let especialidades = @json($especialidades);
        let cita = @json($agenda);

        var calendar = new FullCalendar.Calendar(calendarEl, {
            timeZone: 'UTC',
            locale: 'es',
            slotMinTime: '8:00:00',
            slotMaxTime: '20:00:00',
            initialView: 'resourceTimelineDay',
            slotMinWidth: '50',
            aspectRatio: 1.8,
            headerToolbar: {
                left: 'prev,next',
                center: 'title',
                right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
            },
            buttonText:{ today: 'Hoy', month: 'Mes', week: 'Semana', day: 'Dia', list: 'Lista'},
            resourceAreaHeaderContent: 'Profesionales',
            resources: prof,
            events: cita,
            dateClick: function(info) {
                let fecha = FullCalendar.formatDate(info.date, {month: '2-digit', year: 'numeric', day: '2-digit'});
                let hora = FullCalendar.formatDate(info.date, {hour: '2-digit', minute: '2-digit',  timeZone: 'utc', locale: 'es'});
                //Validar que solo se abra el modal si es un profesional
                let validacion = Object.values(especialidades).includes(info.resource.id);
                if (!validacion){
                    Livewire.dispatch('profSelected', { 
                        profesional: info.resource.id, 
                        fecha: fecha, 
                        hora: hora
                    });
                    Alpine.store('modal').toggle()
                }
            },
            eventClick: function(info) {
                //console.log(info.event.id );   
                Livewire.dispatch('citaSelected', { 
                        citaId: info.event.id
                    });                         
                Alpine.store('edit').toggle()
            }
        });
        calendar.render();

        Livewire.on('addCita', (event) => {
            calendar.addEvent({ 
                id: event.id,
                resourceId: event.resourceId,
                title: event.nombre,
                start: event.ini,
                end: event.fin
            })
            Alpine.store('modal').toggle()
        });

        Livewire.on('editarCita', (event) => {
            let cita = calendar.getEventById(event.id)
            cita.setStart(event.ini)
            cita.setEnd(event.fin)
            Alpine.store('edit').toggle()
        });

        Livewire.on('deleteCita', (event) => {
            let cita_ = calendar.getEventById(event.id)
            cita_.remove()
            Alpine.store('edit').toggle()
        });


    </script>
    @endscript

</div>
