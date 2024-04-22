<div wire:ignore.self class="modal fade" role="dialog" id="showPending" tabindex="-1"
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

                                            <li>Reservation Item/Venue Total: <strong>{{ $itemCount ?? '' }}</strong>
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
                                            <li> Signature: <a href="{{ asset('storage/' . $image ?? '') }}"
                                                    target="_blank">View</a></li>
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
                        <div class="col-md-12">
                            <div class="col-sm-12 table-responsive">
                                <table class="table cart-table table-borderless">
                                    <tbody>
                                        @if (!empty($item))
                                            @foreach ($item as $cartlist)
                                                <tr class="table-order">
                                                    <td>
                                                        <a href="#">
                                                            @if ($cartlist->product->productImages->isNotEmpty())
                                                                @php $firstImage = $cartlist->product->productImages->first(); @endphp
                                                                <img src="{{ asset('storage/' . $firstImage->image) }}"
                                                                    class=" blur-up lazyload" alt="">
                                                            @endif

                                                        </a>
                                                    </td>
                                                    <td>
                                                        <p class="font-light">Product Name</p>
                                                        <h5><a href="#">{{ $cartlist->product->name }}</a>
                                                        </h5>
                                                    </td>
                                                    <td>
                                                        <p class="font-light">Quantity</p>
                                                        <h5>{{ $cartlist->quantity }}</h5>
                                                    </td>

                                                </tr>
                                            @endforeach
                                        @endif



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
                <button type="button" wire:click="cancelReservation" class="btn btn-danger">Cancel</button>
                <button type="button" wire:click="approvedReservation" class="btn btn-primary">Approved</button>
            </div>
        </div>

    </div>
</div>
