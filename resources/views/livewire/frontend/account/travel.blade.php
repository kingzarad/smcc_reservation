<div class="col-lg-9">
    <div class="filter-button dash-filter dashboard">
        <button class="btn btn-solid-default btn-sm fw-bold filter-btn">Show Menu</button>
    </div>


    <div>
        <div class="box-head">
            <h3>Travel Order</h3>
            <button class="btn btn-solid-default btn-sm fw-bold ms-auto" data-bs-toggle="modal"
                data-bs-target="#uploadTravel"><i class="fas fa-plus"></i>
                Add New Travel Documents</button>
        </div>
        <div class="save-details-box">
            <div class="row g-3">
                @if ($travelist->isEmpty())
                    <h3><strong>Travel order list is empty.</strong></h3>
                @else
                    <div class="table-dashboard dashboard wish-list-section">

                        <div class="table-responsive">
                            <table class="table cart-table">
                                <thead>
                                    <tr class="table-head">
                                        <th scope="col">Image</th>
                                        <th scope="col">Note</th>
                                        <th scope="col">Date Filed</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($travelist as $item)
                                        <tr>
                                            <td>

                                                <div class="image-container">
                                                    <img class="img-thumbnail"
                                                        src="{{ asset('storage/' . $item->image) }}"
                                                        alt="Product Image">
                                                </div>

                                            </td>

                                            <td>
                                                <p class="fs-6 m-0">{{ $item->note }}</p>
                                            </td>
                                            <td>
                                                {{ $item->created_at }}
                                            </td>
                                            <td>
                                                @if ($item->status == 0)
                                                    <p class="btn-success text-white btn btn-sm">ACCEPTED</p>
                                                @elseif ($item->status == 1)
                                                    <p class="btn-warning  text-white btn btn-sm">PENDING</p>
                                                @elseif ($item->status == 2)
                                                    <p class="btn-danger  text-white btn btn-sm">DECLINED</p>
                                                @endif

                                            </td>
                                            <td>
                                                <a href="{{ asset('storage/' . $item->image) }}" target="_blank">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="uploadTravel" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <form wire:submit.prevent="uploadTravelOrder">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Upload Travel Order
                        </h5>

                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="photos" class="form-label">Upload photo of travel order</label>

                            <input class="form-control" type="file" wire:model="photos" accept=".jpg, .jpeg, .png">
                            @error('photos')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="row mt-3">
                                @if ($photos)
                                    <div class="col-md-3 mb-2">
                                        <div class="image-container">
                                            <img class="img-thumbnail" src="{{ $photos->temporaryUrl() }}">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="note" class="form-label">Note (Optional)</label>
                            <input type="text" wire:model="note" class="form-control" id="note">
                            @error('note')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" wire:click="closeModal" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
