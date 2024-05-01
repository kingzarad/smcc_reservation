<div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
    @include('shared.offline')
    <div class="card">
        @include('livewire.admin.venue.modal')
        <div class="card-body p-3">
            <h4 class="card-title">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-muted">VENUE MANAGEMENT</h5>
                    <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#addVenueModal"><i
                            class="fa fa-plus-square"></i>&nbsp;ADD NEW VENUE</button>
                </div>
            </h4>
            <div class="table-responsived">
                <table id="datatable" class="table table-borderless">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th style="width:50px">#</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th style="width:160px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($venue as $items)
                            <tr>
                                <td>{{ $items->id }}</td>
                                <td>{{ $items->name }}</td>
                                <td>{{ $items->quantity }}</td>

                                <td>
                                    <div class="dropdown d-flex justify-content-center">
                                        <button class="btn btn-secondary btn-custom btn-sm dropdown-toggle"
                                            type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                            <div class="dropdown-item">
                                                <div class="d-flex align-items-center gap-3">
                                                    <button type="button"
                                                        wire:click="editVenue({{ $items->id }})"
                                                        data-bs-toggle="modal" data-bs-target="#updateVenueModal"
                                                        class="btn btn-sm btn-warning "><i
                                                            class="fa fa-pencil-square-o"></i></button>
                                                    <button data-bs-toggle="modal"
                                                        data-bs-target="#deleteVenueModal"
                                                        wire:click="deleteVenue({{ $items->id }})"
                                                        class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash-o"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
