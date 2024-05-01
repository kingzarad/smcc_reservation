<div wire:ignore.self class="modal fade" role="dialog" id="showHistory" tabindex="-1"
    aria-labelledby="showPendingModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Reservation Information</h1>
            </div>
            <div class="modal-body">
                <div class="cart-section order-details-table">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="order-success">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-6">
                                        <h4>Summary </h4>
                                        <ul class="order-details">
                                            <li>Reference: <strong>{{ $details->reference_num ?? '' }}</strong></li>
                                            <li>Date:
                                                {{ \Carbon\Carbon::parse($details?->date_from ?? '')->format('F j, Y') }}
                                                -
                                                {{ \Carbon\Carbon::parse($details?->date_to ?? '')->format('F j, Y') }}
                                            </li>
                                            <li>Time:
                                                {{ \Carbon\Carbon::parse($details?->time_from ?? '')->format('h:i A') }}
                                                -
                                                {{ \Carbon\Carbon::parse($details?->time_to ?? '')->format('h:i A') }}
                                            </li>
                                            <li>Time Return:
                                                <strong>{{ \Carbon\Carbon::parse($details?->time_return ?? '')->format('h:i A') }}</strong>
                                            </li>

                                            <li>Reservation Item/Venue Total:
                                                <strong>{{ $itemCount ?? '' }}</strong>
                                            </li>
                                            <li>Purpose: {{ Str::ucfirst($details->purpose ?? '') }}</li>
                                            <li>Remarks: {{ Str::ucfirst($details->remarks ?? '') }}</li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-6">
                                        <h4>reservor details</h4>
                                        <ul class="order-details">
                                            <li>Name: <strong>{{ Str::ucfirst($users->firstname ?? '?') }}
                                                    {{ Str::ucfirst($users->middlename ?? '') }}
                                                    {{ Str::ucfirst($users->lastname ?? '') }}</strong></li>
                                            <li>Position:
                                                {{ Str::ucfirst($users->positionDetails->position_name ?? '') }}
                                            </li>
                                            <li>Department:
                                                {{ Str::ucfirst($users->departmentDetails->department_name ?? '') }}
                                            </li>
                                            <li>Address: {{ Str::ucfirst($users->address ?? '') }}</li>
                                            <li> Signature: &nbsp;<br> <a href="{{ asset('storage/' . $image ?? '') }}"
                                                    target="_blank">
                                                    <strong> View</strong>
                                                </a></li>
                                            @if ($status != 2 && $status != 3)
                                                <li>
                                                    <div class="card mt-3">
                                                        <div class="card-body">
                                                            Confirmation Code: <h2>
                                                                <strong>{{ $referenceNumber ?? '' }}</strong>
                                                            </h2>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>



                                    <div class="col-md-12">
                                        <div class="delivery-sec">
                                            <h3>expected return date of Reservation: <span>
                                                    {{ \Carbon\Carbon::parse($details->date_return ?? '')->format('F j, Y') }}</span>
                                            </h3>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 row p-3">
                            <div class="col-sm-6 table-responsive border">
                                <h5 class="mt-3">Venue/Rooms</h5>
                                <hr>
                                <table class="table cart-table table-borderless">
                                    <tbody>
                                        @foreach ($venue_list as $venuelist)
                                            <tr class="table-order">
                                                <td>
                                                    <p class="font-light">Name</p>
                                                    <h5>{{ $venuelist->Venue->name }}</h5>
                                                </td>
                                                <td>
                                                    <p class="font-light">Quantity</p>
                                                    <h5>{{ $venuelist->quantity }}</h5>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>
                            <div class="col-sm-6 table-responsive border">
                                <h5 class="mt-3">Items</h5>
                                <hr>
                                <table class="table cart-table table-borderless">
                                    <tbody>
                                        @foreach ($item_list as $cartlist)
                                            <tr class="table-order">
                                                <td>
                                                    <p class="font-light">Name</p>
                                                    <h5>{{ $cartlist->Items->name }}</h5>
                                                </td>
                                                <td>
                                                    <p class="font-light">Quantity</p>
                                                    <h5>{{ $cartlist->quantity }}</h5>
                                                </td>

                                            </tr>
                                        @endforeach

                                    </tbody>

                                </table>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal"
                    data-bs-dismiss="modal">Close</button>

                @if ($status == 1)
                    <button type="button" wire:click="doneReservation" class="btn btn-info"
                        wire:loading.attr="disabled">
                        Mark As Completed

                    </button>
                @endif

                @if ($status != 2 && $status != 3 && $expire_status == true)
                    <button type="button" wire:click="cancelReservation" class="btn btn-danger"
                        wire:loading.attr="disabled">
                        Cancel
                    </button>
                @endif


            </div>
        </div>

    </div>
</div>
