<div>
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
                alert('Clicked on: ' + info.dateStr);
                alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                alert('Current view: ' + info.view.type);
                // change the day's background color just for fun
                info.dayEl.style.backgroundColor = 'red';
            },
            eventMouseEnter: function(info) {
                console.log(info.event.start.getUTCHours() );
                
            }
        });

        calendar.render();
        });

    </script>
    @endpush

</div>
