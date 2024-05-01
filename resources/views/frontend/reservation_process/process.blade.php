<section class="section-b-space">
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
                            <label for="name" class="form-label">Address</label>
                            <input type="text" readonly class="form-control"
                                value="{{ Str::ucfirst($users?->address) }}" placeholder="Enter Address">
                        </div>

                    </div>

                    <div id="shippingAddress" class="row g-4 mt-5">
                        <h3 class="mb-3 theme-color">RESERVATION DETAILS</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">DATE OF USAGE (FROM)</label>
                            <input type="date" wire:model="dsfrom" class="form-control" id="dsfrom">
                            @error('dsfrom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">DATE OF USAGE (TO)</label>
                            <input type="date" wire:model="dsto" class="form-control" id="dsto">
                            @error('dsto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="phone" class="form-label">DATE RETURN</label>
                            <input type="date" wire:model="dsreturn" class="form-control" id="dsreturn">
                            @error('dsreturn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="locality" class="form-label">TIME OF USAGE (FROM)</label>
                            <input type="time" wire:model="tsfrom" class="form-control" id="tsfrom">
                            @error('tsfrom')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="landmark" class="form-label">TIME OF USAGE (TO)</label>
                            <input type="time" wire:model="tsto" class="form-control" id="tsto">
                            @error('tsto')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="phone" class="form-label">TIME OF RETURN</label>
                            <input type="time" wire:model="tsreturn" class="form-control" id="tsreturn">
                            @error('tsreturn')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <label for="address" class="form-label">PURPOSE</label>
                            <textarea wire:model="purpose" class="form-control" id="purpose"></textarea>
                            @error('purpose')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="city" class="form-label">REMARKS (OPTIONAL)</label>
                            <input type="text" wire:model="remarks" class="form-control" id="remarks">
                            @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="selectedLocation"
                                    value="inside" id="flexRadioDefault2" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    INSIDE OF THE SCHOOL
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" wire:model="selectedLocation"
                                    value="outside" id="flexRadioDefault1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    OUTSIDE OF THE SCHOOL
                                </label>
                            </div>

                        </div>
                        <div x-data="{ signatureOption: 'draw' }">
                            <div class="col-md-12">
                                <label for="signature" class="form-label">Signature Options</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="signatureOption"
                                        id="drawSignature" value="draw" x-model="signatureOption">
                                    <label class="form-check-label" for="drawSignature">Draw Signature</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="signatureOption"
                                        id="uploadSignature" value="upload" x-model="signatureOption">
                                    <label class="form-check-label" for="uploadSignature">Upload Signature</label>
                                </div>

                                <div x-show="signatureOption === 'upload'">
                                    <input type="file" wire:model="signature_upload" class="form-control"
                                        accept="image/*">
                                    @error('signature_upload')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div x-show="signatureOption === 'draw'">
                                    <div id="signature-pad" class="signature-pad">
                                        <div class="signature-pad-body">
                                            <canvas id="signature-canvas" class="border" width="400"
                                                height="200"></canvas>
                                        </div>
                                        <div class="signature-pad-footer">
                                            <button type="button" class="btn btn-sm bg-danger text-white"
                                                wire:click="clearSignature">Clear</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>


                    <hr class="my-lg-5 my-4">

                    <button class="btn btn-solid-default mt-4" wire:click="goBack" type="button">GO BACK</button>
                    <button class="btn btn-solid-default mt-4" id="saveSignature" type="submit">
                        PLACE RESERVATION
                    </button>

                </form>
            </div>

            <div class="col-lg-5">
                <div class="your-cart-box" style="position: static !important">
                    <h3 class="mb-3 d-flex text-capitalize">VENUE/ROOMS LIST
                    </h3>

                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Name</th>
                                <th scope="col">available</th>
                                <th scope="col">quantity</th>

                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($venue_list as $venue_cart)
                                <tr>
                                    <td>
                                        {{ $venue_cart->name }}
                                    </td>
                                    <td>
                                        {{ $venue_cart->quantity }}
                                    </td>
                                    <td>
                                        <div class="qty-box">
                                            <div class="input-group d-flex align-items-center">

                                                <span class="input-group-prepend">
                                                    <button type="button"
                                                        wire:click="decrementVenueQuantity({{ $venue_cart->id }})"
                                                        class="btn btn-sm">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" class="form-control input-number"
                                                    wire:model.lazy="venue_qty.{{ $venue_cart->id }}"
                                                    wire:change="handleInputVenueChange({{ $venue_cart->id }}, $event.target.value)">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-prepend">
                                                        <button type="button"
                                                            wire:click="incrementVenueQuantity({{ $venue_cart->id }})"
                                                            class="btn btn-sm">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </span>
                                            </div>
                                        </div>
                                    </td>



                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex mt-3">
                        {{ $venue_list->links(data: ['scrollTo' => false]) }}
                    </div>
                </div>

                <div class="your-cart-box mt-5" style="position: static !important">
                    <h3 class="mb-3 d-flex text-capitalize">ITEMS LIST
                    </h3>

                    <table class="table cart-table">
                        <thead>
                            <tr class="table-head">
                                <th scope="col">Name</th>
                                <th scope="col">available</th>
                                <th scope="col">quantity</th>

                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($item_list as $item_cart)
                                <tr>
                                    <td>
                                        {{ $item_cart->name }}
                                    </td>
                                    <td>
                                        {{ $item_cart->quantity }}
                                    </td>
                                    <td>
                                        <div class="qty-box">
                                            <div class="input-group d-flex align-items-center">

                                                <span class="input-group-prepend">
                                                    <button type="button"
                                                        wire:click="decrementItemQuantity({{ $item_cart->id }})"
                                                        class="btn btn-sm">
                                                        <i class="fas fa-minus"></i>
                                                    </button>
                                                </span>
                                                <input type="text" class="form-control input-number"
                                                    wire:model.lazy="item_qty.{{ $item_cart->id }}"
                                                    wire:change="handleInputItemChange({{ $item_cart->id }}, $event.target.value)">
                                                <span class="input-group-prepend">
                                                    <button type="button"
                                                        wire:click="incrementItemQuantity({{ $item_cart->id }})"
                                                        class="btn btn-sm">
                                                        <i class="fas fa-plus"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </td>


                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <div class="d-flex mt-3">
                        {{ $item_list->links(data: ['scrollTo' => false]) }}
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/signature_pad/1.5.3/signature_pad.min.js"></script>
    <script>
        document.addEventListener('livewire:init', () => {
            const canvas = document.getElementById('signature-canvas');
            const signaturePad = new SignaturePad(canvas);
            const saveButton = document.getElementById('saveSignature');

            window.addEventListener('livewire:load', function() {
                Livewire.hook('message.processed', () => {
                    signaturePad.clear(); // Clear signature pad after Livewire update
                });
            });

            // Livewire listeners for clearing and saving signature
            Livewire.on('clearSignature', () => {
                signaturePad.clear();
            });


            saveButton.addEventListener('click', () => {
                if (drawSignature.checked) {
                    if (signaturePad.isEmpty()) {
                        alert('Please provide a signature.');
                        return;
                    }

                    var signatureData = signaturePad.toDataURL('image/png');
                    @this.set('signatureData', signatureData);
                }
            });



        });
    </script>


</section>
