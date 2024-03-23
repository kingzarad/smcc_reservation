{{-- Modal Department --}}
<div wire:ignore.self class="modal fade" role="dialog" id="addDepartmentModal" tabindex="-1"
    aria-labelledby="addDepartmentModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form wire:submit.prevent="saveDepartment">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addDepartmentModalLabel">Add Department</h1>
                </div>
                <div class="modal-body">
                    @include('shared.success')
                    <div class="mb-3">
                        <label for="department_name" class="form-label">Name</label>
                        <input type="text" wire:model="department_name" class="form-control" id="department_name">
                        @error('department_name')
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

<div wire:ignore.self class="modal fade" role="dialog" id="updateDepartmentModal" tabindex="-1"
    aria-labelledby="updateDepartmentModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="updateDepartment">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateDepartmentModalLabel">Update Department</h1>
                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="department_name_u" class="form-label">Name</label>
                        <input type="text" wire:model="department_name" class="form-control" id="department_name">
                        @error('department_name')
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

<div wire:ignore.self class="modal fade" role="dialog" id="deleteDepartmentModal" tabindex="-1"
    aria-labelledby="deleteDepartmentModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="destroyDepartment">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteDepartmentModalLabel">Department</h1>
                </div>
                <div class="modal-body">
                    <h6 class="text-danger">Are you sure you want to delete this department?</h6>
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
