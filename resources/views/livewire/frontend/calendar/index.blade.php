<section class="ratio_asos overflow-hidden">

    <div class="container p-sm-0">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 text-center">
                    <h2>Reservation Calendar</h2>
                    <h5 class="theme-color"></h5>
                </div>
            </div>
        </div>

        <div class="row g-sm-4 g-3">

            <div class="col-lg-2"></div>
            <div class="col">
                <div id="calendar"></div>

            </div>
            <div class="col-lg-2"></div>
        </div>


            <script>
                document.addEventListener('livewire:init', function() {
                    var calendarEl = document.getElementById('calendar');

                    var calendar = new FullCalendar.Calendar(calendarEl, {
                        timeZone: 'UTC',
                        initialView: 'dayGridMonth',
                        events: @json($events),
                        eventClick: function(info) {
                            var url = info.event.extendedProps.url;

                            console.log(url);

                        }
                    });

                    calendar.render();




                });
            </script>

    </div>
</section>
