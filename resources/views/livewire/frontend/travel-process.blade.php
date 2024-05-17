<section class="section-b-space">
    <style>
        .image-container {
            width: 100%;
            height: 0;
            padding-bottom: 100%;
            /* This creates a square aspect ratio */
            position: relative;
            overflow: hidden;
        }

        .image-container img {
            position: absolute;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures the image covers the container without stretching */
        }
    </style>
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <form class="needs-validation" wire:submit.prevent="processReserv">

                    <div id="billingAddress" class="row g-4">
                        @if (Auth::user()->role_as == 1)
                            <div class="alert alert-warning d-flex align-items-center" role="alert">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2"
                                    viewBox="0 0 16 16" role="img" aria-label="Warning:">
                                    <path
                                        d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                </svg>
                                <div>
                                    Administrator Mode
                                </div>
                            </div>
                        @endif
                        <h3 class="mb-3 theme-color">RESERVOR DETAILS</h3>

                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" readonly class="form-control" id="name" name="name"
                                value="{{ Str::ucfirst($users?->firstname) }} {{ Str::ucfirst($users?->middlename) }} {{ Str::ucfirst($users?->lastname) }}"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Email</label>
                            <input type="text" readonly class="form-control"
                                value="{{ $users?->usersDetails->email }}" placeholder="Enter Email">
                        </div>
                        <div class="col-md-6">
                            <label for="name" readonly class="form-label">Position</label>
                            <input type="text" readonly class="form-control"
                                value="{{ Str::ucfirst($users?->positionDetails->position_name) }}"
                                placeholder="Enter Position">
                        </div>
                        <div class="col-md-6">
                            <label for="name" readonly class="form-label">Department</label>
                            <input type="text" readonly class="form-control"
                                value="{{ Str::ucfirst($users?->departmentDetails->department_name) }}"
                                placeholder="Enter Department">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Contact #</label>
                            <input type="text" readonly class="form-control"
                                value="{{ Str::ucfirst($users?->contact) }}" placeholder="Enter Address">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Address</label>
                            <input type="text" readonly class="form-control"
                                value="{{ Str::ucfirst($users?->address) }}" placeholder="Enter Address">
                        </div>

                    </div>

                    <div id="shippingAddress" class="row g-4 mt-5">
                        <h3 class="mb-3 theme-color">TRAVEL ORDER DETAILS</h3>

                        <div class="col-md-12">
                            <label for="phone" class="form-label">TRAVEL DATE</label>
                            <input type="date" wire:model="date" class="form-control" id="date" onkeypress="return false">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="phone" class="form-label">TRAVEL TIME</label>
                            <input type="time" wire:model="time" class="form-control" id="time">
                            @error('time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>


                        <div class="col-md-12">
                            <label for="phone" class="form-label">TRAVEL DATE RETURN</label>
                            <input type="date" wire:model="date" class="form-control" id="date" onkeypress="return false">
                            @error('date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="phone" class="form-label">SELECT VEHICLE</label>
                            <select class="form-control" wire:model="vehicle_id">
                                <option value="" selected></option>
                                @foreach ($vehicle as $item)
                                    <option value="{{ $item->id }}">{{ ucfirst($item->name) }}
                                    </option>
                                @endforeach
                            </select>
                            @error('time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="phone" class="form-label">TRAVEL PURPOSE</label>
                            <input type="text" wire:model="purpose" class="form-control" id="purpose">
                            @error('purpose')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="phone" class="form-label">UPLOAD TRAVEL ORDER</label>
                            <input type="file" wire:model="upload" class="form-control" accept="image/*">
                            @error('upload')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror


                        </div>

                    </div>


                    <hr class="my-lg-5 my-4">

                    <button class="btn btn-solid-default mt-4" wire:click="goBack" type="button">GO BACK</button>
                    <button class="btn btn-solid-default mt-4" id="saveSignature" type="submit">
                        PLACE TRAVEL ORDER
                    </button>

                </form>
            </div>


        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(function() {
            var dtToday = new Date();

            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if (month < 10)
                month = '0' + month.toString();
            if (day < 10)
                day = '0' + day.toString();

            var maxDate = year + '-' + month + '-' + day;

            // or instead:
            // var maxDate = dtToday.toISOString().substr(0, 10);

            $('#date').attr('min', maxDate);

        });
    </script>


</section>
