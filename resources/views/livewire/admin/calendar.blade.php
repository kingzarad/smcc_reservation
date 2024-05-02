<div>
    <div id="calendar" class="bg-white p-3"></div>
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
