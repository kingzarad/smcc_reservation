<div class="card">

    <div class="card-body">
        <h5 class="card-title">Reservation Calendar</h5>
        <div id="calendar"></div>
    </div>
    <script>
        document.addEventListener('livewire:init', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                timeZone: 'UTC',
                themeSystem: 'bootstrap5',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,multiMonthYear'
                },

                events: @json($events),
                eventContent: function(arg) {
                    return {
                        html: arg.event.title
                    };
                },


            });

            calendar.render();

        });
    </script>
</div>
