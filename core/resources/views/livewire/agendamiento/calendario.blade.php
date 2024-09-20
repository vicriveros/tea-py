<div>
    <div id="modal_container" x-data>
        <!-- Button to trigger modal -->
        <button @click="$store.modal.toggle()" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Open Modal
        </button>

        <!-- Modal -->
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
                            Cancel
                        </button>
                    </div>
                </div> <!-- Modal panel -->
                
            </div>
        </div><!-- Modal -->
    </div> <!-- Modal Container-->

    <div id="calendar"></div>

    @push('modals')
    <meta charset='utf-8' />
    <!-- <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script> -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@6.1.15/index.global.min.js'></script>

    <script> 
        document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        let prof=[
                    {
                        "id": "a",
                        "title": "Auditorium A"
                    },
                    {
                        "id": "b",
                        "title": "Auditorium B",
                        "eventColor": "green"
                    },
                    {
                        "id": "c",
                        "title": "Auditorium C",
                        "eventColor": "orange"
                    },
                    {
                        "id": "d",
                        "title": "Auditorium D",
                        "children": [
                            {
                                "id": "d1",
                                "title": "Room D1"
                            },
                            {
                                "id": "d2",
                                "title": "Room D2"
                            }
                        ]
                    }
                ];
        let cita=[
                    {
                        "resourceId": "a",
                        "title": "event 1",
                        "start": "2024-09-13T09:00:00+00:00",
                        "end": "2024-09-13T09:45:00+00:00"
                    },
                    {
                        "resourceId": "d1",
                        "title": "event 3",
                        "start": "2024-09-13T12:00:00+00:00",
                        "end": "2024-09-13T12:45:00+00:00"
                    },
                    {
                        "resourceId": "f",
                        "title": "event 4",
                        "start": "2024-09-13T07:30:00+00:00",
                        "end": "2024-09-13T09:30:00+00:00"
                    },
                    {
                        "resourceId": "d1",
                        "title": "event 34",
                        "start": "2024-09-13T12:45:00+00:00",
                        "end": "2024-09-13T13:45:00+00:00"
                    },
                    {
                        "resourceId": "b",
                        "title": "event 5",
                        "start": "2024-09-13T10:00:00+00:00",
                        "end": "2024-09-13T15:00:00+00:00"
                    },
                    {
                        "resourceId": "e",
                        "title": "event 2",
                        "start": "2024-09-13T09:00:00+00:00",
                        "end": "2024-09-13T14:00:00+00:00"
                    }
                ]

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
            editable: true,
            resourceAreaHeaderContent: 'Profesionales',
            resources: prof,
            events: cita,
            dateClick: function(info) {
                let fecha = info.date.getUTCMonth() +'-'+ info.date.getUTCDate() +'-'+ info.date.getUTCFullYear();
                let hora = info.date.getUTCHours() +':'+ info.date.getUTCMinutes() +':'+ info.date.getUTCSeconds();

                Livewire.dispatch('profSelected', { 
                    profesional: info.resource.id, 
                    fecha: fecha, 
                    hora: hora
                });
                Alpine.store('modal').toggle()
            },
            eventMouseEnter: function(info) {
                console.log(info.event.start.getUTCHours() );                
            }
        });

        calendar.render();
        });

        document.addEventListener('alpine:init', () => {
            Alpine.store('modal', {
                on: false,
    
                toggle() {
                    this.on = ! this.on
                }
            })
        })
    </script>
    @endpush

</div>
