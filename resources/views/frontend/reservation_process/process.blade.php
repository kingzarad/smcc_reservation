<section class="section-b-space">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-7">
                <form class="needs-validation" wire:submit.prevent="ProcessSubmit">

                    <div id="billingAddress" class="row g-4">
                        <h3 class="mb-3 theme-color">RESERVOR DETAILS</h3>
                        <div class="col-md-6">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" readonly class="form-control" id="name" name="name"
                                value="{{ Str::ucfirst($users->firstname) }} {{ Str::ucfirst($users->middlename) }} {{ Str::ucfirst($users->lastname) }}"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Email</label>
                            <input type="text" readonly class="form-control"
                                value="{{ $users->usersDetails->email }}" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6">
                            <label for="name" readonly class="form-label">Position</label>
                            <input type="text" readonly class="form-control"
                                value="{{ Str::ucfirst($users->positionDetails->position_name) }}"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-6">
                            <label for="name" readonly class="form-label">Department</label>
                            <input type="text" readonly class="form-control"
                                value="{{ Str::ucfirst($users->departmentDetails->department_name) }}"
                                placeholder="Enter Full Name">
                        </div>
                        <div class="col-md-12">
                            <label for="name" class="form-label">Address</label>
                            <input type="text" readonly class="form-control"
                                value="{{ Str::ucfirst($users->address) }}" placeholder="Enter Full Name">
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
                            <label for="city" class="form-label">REMARKS</label>
                            <input type="text" wire:model="remarks" class="form-control" id="remarks">
                            @error('remarks')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="col-md-12">
                            <label for="city" class="form-label">Upload Signature</label>

                            <input type="file" wire:model="signature" class="form-control" id="signature">
                            @error('signature')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                    </div>


                    <hr class="my-lg-5 my-4">

                    <button class="btn btn-solid-default mt-4" wire:click="goBack" type="button">GO BACK</button>
                    <button class="btn btn-solid-default mt-4" type="submit">PLACE RESERVATION</button>

                </form>
            </div>

            <div class="col-lg-5">
                <div class="your-cart-box">
                    <h3 class="mb-3 d-flex text-capitalize">RESERVATION LIST<span
                            class="badge bg-theme new-badge rounded-pill ms-auto bg-dark">
                            <livewire:frontend.cart-list.cart-count /></span>
                    </h3>
                    @if ($cartlists->isEmpty())
                        <h3><strong>Your cart list is empty.</strong></h3>
                    @else
                        <table class="table cart-table">
                            <thead>
                                <tr class="table-head">
                                    <th scope="col">image</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">quantity</th>

                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($cartlists as $item_cart)
                                    <tr>
                                        <td>

                                            <a
                                                href="{{ url('collection', urlencode($item_cart->product->category->slug) . '/' . urlencode($item_cart->product->slug)) }}">
                                                @if ($item_cart->product->productImages->isNotEmpty())
                                                    @php $firstImage = $item_cart->product->productImages->first(); @endphp
                                                    <img src="{{ asset('storage/' . $firstImage->image) }}"
                                                        class=" blur-up lazyload" alt="">
                                                @endif

                                            </a>
                                        </td>
                                        <td>
                                            <a
                                                href="{{ url('collection', urlencode($item_cart->product->category->slug) . '/' . urlencode($item_cart->product->slug)) }}">{{ $item_cart->product->name }}</a>
                                        </td>

                                        <td>
                                            {{ $item_cart->quantity }}
                                        </td>


                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
