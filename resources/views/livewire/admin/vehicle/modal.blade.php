{{-- Modal Department --}}
<div wire:ignore.self class="modal fade" role="dialog" id="addVehicleModal" tabindex="-1"
    aria-labelledby="addDepartmentModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form wire:submit.prevent="saveVehicle">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDepartmentModalLabel">Add Vehicle</h1>
                </div>
                <div class="modal-body">
                    @include('shared.success')
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
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
        </form>
    </div>
</div>

<div wire:ignore.self class="modal fade" role="dialog" id="updateVehicleModal" tabindex="-1"
    aria-labelledby="" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="updateVehicle">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Update Vehicle</h1>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" wire:model="name" class="form-control">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div wire:ignore.self class="modal fade" role="dialog" id="deleteVehicleModal" tabindex="-1"
    aria-labelledby="deleteDepartmentModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="destroyVehicle">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Vehicle</h1>
                </div>
                <div class="modal-body">
                    <h6 class="text-danger">Are you sure you want to delete this Vehicle?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- Department end --}}
