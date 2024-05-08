<section class="ratio_asos overflow-hidden">
    <style>
        .a {
            background: #120D4F !important;
            color: #ffff;
            border-color: #120D4F !important;
        }

        .btn-custom {
            background: #120D4F !important;
            color: #ffff;
        }

        .btn-custom:hover {
            background: #120D4F !important;
            color: #fff;
        }
    </style>
    <div class="container-fluid m-6">
        <div class="row m-0">
            <div class="col-12 p-0">
                <div class="title-3 ">
                    <h2>RESERVATION CALENDAR</h2>
                    <h5 class="theme-color"></h5>
                </div>
            </div>
        </div>

        <div class="row g-sm-4 g-3 mb-5">
            <div class="col">
                <div id="calendar"></div>

            </div>
            <div class="col-lg-3">
                @guest
                    <livewire:auth.front-login />
                @endguest
                @auth
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-sm btn-custom mx-3" href="{{ route('reservation_process') }}">Add Reservation</a>
                        {{-- <button class="btn btn-sm btn-custom mx-3" wire:click="checkUser"  data-bs-toggle="modal" data-bs-target="#addReservModal">Add Reservation</button> --}}
                        <a class="btn btn-sm btn-custom" href="{{ route('myaccount.dashboard') }}">My Account</a>
                    </div>
                    <livewire:frontend.myreservation />
                @endauth
            </div>
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
</section>
