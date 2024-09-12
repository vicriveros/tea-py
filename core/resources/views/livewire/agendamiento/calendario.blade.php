<div>
    <div id="calendar"></div>

    @push('modals')
    <meta charset='utf-8' />
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

    <script> 
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                locale: 'es',
                initialView: 'timeGridWeek',
                slotMinTime: '8:00:00',
                slotMaxTime: '19:00:00',
                editable: true,
                selectable: true,
                dateClick: function(info) {
                    alert('clicked ' + info.date.getHours() + ':' + info.date.getMinutes());
                },
                events: 'https://fullcalendar.io/api/demo-feeds/events.json',
            });
            calendar.render();
        });

    </script>
    @endpush

</div>
