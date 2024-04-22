<div class="table-responsived">
    <style>
        .btn-success {
            background: #3F8E4E !important;
        }
    </style>
    <table id="datatable" class="table table-borderless">
        <thead class="bg-gradient-primary text-white">
            <tr>
                <th style="width:50px">#</th>
                <th>Travel Order</th>
                <th>Name</th>
                <th>Note (Optional)</th>
                <th>Date Filled</th>

                <th>Status</th>

                <th style="width:160px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($travelPendingList as $pendingList)
                <tr>
                    <td>{{ $pendingList->id }} </td>
                    <td>
                        <a href="{{ asset('storage/' . $pendingList->image) }}" target="_blank">
                            <div class="image-container">
                                <img class="img-thumbnail" src="{{ asset('storage/' . $pendingList->image) }}"
                                    alt="Product Image">
                            </div>
                        </a>
                    </td>
                    <td>{{ $pendingList->usersInfo->username }}</td>
                    <td>{{ $pendingList->note }}</td>
                    <td>{{ $pendingList->created_at }} </td>

                    <td>
                        <span
                            class="badge bg-{{ $pendingList->status == 1 ? 'warning' : 'success' }} ">{{ $pendingList->status == 1 ? 'Pending' : 'Accpepted' }}
                    </td>
                    <td>
                        <div class="dropdown d-flex justify-content-center">
                            <button class="btn btn-secondary btn-custom btn-sm dropdown-toggle" type="button"
                                id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-item">
                                    <div class="d-flex align-items-center gap-3">
                                        <button data-bs-toggle="modal" wire:click="travelID({{ $pendingList->id }})"
                                            data-bs-target="#travelAModal" type="button"
                                            class="btn btn-sm btn-success">
                                            Approved
                                        </button>
                                        <button data-bs-toggle="modal" wire:click="travelID({{ $pendingList->id }})"
                                            data-bs-target="#travelDModal" type="button" class="btn btn-sm btn-danger">
                                            Declined
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>

    <div wire:ignore.self class="modal fade" role="dialog" id="travelAModal" tabindex="-1"
        aria-labelledby="deleteCategoryModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog ">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteCategoryModalLabel">Approved Travel Order?</h1>
                </div>
                <div class="modal-body">
                    <h6 class="text-danger">Are you sure you want to approved travel order?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary"
                        data-bs-dismiss="modal">No</button>
                    <button type="button" wire:click="travelApproved" class="btn btn-info">

                        <div wire:loading.remove>Approved</div>
                        <span wire:loading wire:target="travelApproved">Approving...</span>

                    </button>
                </div>
            </div>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" role="dialog" id="travelDModal" tabindex="-1"
        aria-labelledby="deleteCategoryModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog ">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteCategoryModalLabel">Declined Travel Order?</h1>
                </div>
                <div class="modal-body">
                    <h6 class="text-danger">Are you sure you want to declined this travel order?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary"
                        data-bs-dismiss="modal">No</button>
                    <button type="button" wire:click="travelDeclined" class="btn btn-danger">

                        <div wire:loading.remove>Declined</div>
                        <span wire:loading wire:target="travelDeclined">Declined...</span>

                    </button>
                </div>
            </div>

        </div>
    </div>
</div>
