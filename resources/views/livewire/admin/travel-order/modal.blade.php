<div wire:ignore.self class="modal fade" role="dialog" id="showModal" tabindex="-1" aria-labelledby="showPendingModalLabel"
    aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-xl">

        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Travel Order Information</h1>
            </div>
            <div class="modal-body">
                <div class="cart-section order-details-table">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="order-success">
                                <div class="row m-0 p-0">
                                    <div class="col-sm-6">
                                        <h4>Travel Order Details </h4>
                                        <ul class="order-details">

                                            <li>Travel Date: {{ $date ?? '' }}</li>
                                            <li>Travel Time: {{ $time ?? '' }}</li>
                                            <li>Travel Unit: <strong> {{ $vh_name ?? '' }}</strong></li>
                                            <li> Travel Order: &nbsp;<br> <a
                                                    href="{{ asset('storage/' . $image ?? '') }}" target="_blank">
                                                    <strong> View</strong>
                                                </a></li>
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


                                        </ul>
                                    </div>




                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal"
                    data-bs-dismiss="modal">Close</button>

                @if ($status == 2)
                    <button type="button" wire:click="approvedReservation" class="btn btn-info"
                        wire:loading.attr="disabled">
                        Approved

                    </button>
                @endif

                @if ($status == 0)
                    <button type="button" wire:click="doneReservation" class="btn btn-info"
                        wire:loading.attr="disabled">
                        Mark As Completed

                    </button>
                @endif

                @if ($status == 0 || $status == 2)
                    <button type="button" wire:click="cancelReservation" class="btn btn-danger"
                        wire:loading.attr="disabled">
                        Cancel
                    </button>
                @endif


            </div>
        </div>

    </div>
</div>
