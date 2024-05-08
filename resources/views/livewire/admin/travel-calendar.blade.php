<div class="card">

    <div class="card-body">
        <h5 class="card-title">Travel Order Calendar</h5>
        <div id="calendar-order"></div>
    </div>
    <script>
        document.addEventListener('livewire:init', function() {
            var calendarEl = document.getElementById('calendar-order');

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
