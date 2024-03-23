{{-- Modal Position --}}
<div wire:ignore.self class="modal fade" role="dialog" id="addPositionModal" tabindex="-1"
    aria-labelledby="addPositionModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form wire:submit.prevent="savePosition">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDepartmentModalLabel">Add Position</h1>
                </div>
                <div class="modal-body">
                    @include('shared.success')
                    <div class="mb-3">
                        <label for="position_name" class="form-label">Name</label>
                        <input type="text" wire:model="position_name" class="form-control" id="position_name">
                        @error('position_name')
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

<div wire:ignore.self class="modal fade" role="dialog" id="updatePositionModal" tabindex="-1"
    aria-labelledby="updatePositionModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="updatePosition">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updatePositionModalLabel">Update Position</h1>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="position_name" class="form-label">Name</label>
                        <input type="text" wire:model="position_name" class="form-control" id="position_name">
                        @error('position_name')
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

<div wire:ignore.self class="modal fade" role="dialog" id="deletePositionModal" tabindex="-1"
    aria-labelledby="deletePositionModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="destroyPosition">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deletePositionModalLabel">Position</h1>
                </div>
                <div class="modal-body">
                    <h6 class="text-danger">Are you sure you want to delete this position?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- Position end --}}
