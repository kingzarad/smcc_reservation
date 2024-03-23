<div wire:ignore.self class="modal fade" role="dialog" id="addStocksModal" tabindex="-1"
    aria-labelledby="addProductModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form wire:submit.prevent="saveProduct">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductModalLabel">Add Product</h1>
                </div>
                <div class="modal-body">
                    @include('shared.success')
                    <div class="row">
                        <div class="col border-end">
                            <div class="mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" wire:model="name" class="form-control" id="name">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="small_description" class="form-label">Small Description</label>
                                <input type="text" wire:model="small_description" class="form-control"
                                    id="small_description">
                                @error('small_description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="description" class="form-label">Description</label>
                                <textarea wire:model="description" class="form-control" id="description" cols="30" rows="3"></textarea>
                                @error('description')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

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
