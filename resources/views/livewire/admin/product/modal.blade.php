{{-- Modal Product --}}
<div wire:ignore.self class="modal fade" role="dialog" id="addProductModal" tabindex="-1"
    aria-labelledby="addProductModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
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
                        <div class="col">
                            <div class="mb-2">
                                <label for="category_id" class="form-label">Category</label>

                                <select class="form-control" wire:model="category_id" id="category_id">
                                    <option value="" selected></option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="photos" class="form-label">Photos</label>

                                <input class="form-control" type="file" wire:model="photos"
                                    accept=".jpg, .jpeg, .png">
                                @error('photos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="row mt-3">
                                    @if ($photos)
                                        @foreach ($photos as $photo)
                                            <div class="col-md-3 mb-2">
                                                <div class="image-container">
                                                    <img class="img-thumbnail" src="{{ $photo->temporaryUrl() }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
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

<div wire:ignore.self class="modal fade" role="dialog" id="updateProductModal" tabindex="-1"
    aria-labelledby="updateProductModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <form wire:submit.prevent="updateProduct">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateProductModalLabel">Update Product</h1>
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
                        <div class="col">
                            <div class="mb-2">
                                <label for="category_id" class="form-label">Category</label>

                                <select class="form-control" wire:model="category_id" id="category_id">
                                    <option value="" selected></option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ ucfirst($item->name) }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-2">
                                <label for="photos" class="form-label">Photos</label>

                                <input class="form-control" type="file" wire:model="photos"
                                    accept=".jpg, .jpeg, .png">
                                @error('photos')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="row mt-3">
                                    @if ($photos)
                                        @foreach ($photos as $photo)
                                            <div class="col-md-3 mb-2">
                                                <div class="image-container">
                                                    <img class="img-thumbnail" src="{{ $photo->temporaryUrl() }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    @elseif ($photos_display)
                                        @foreach ($photos_display as $photo)
                                            <div class="col-md-3 mb-2">
                                                <div class="image-container">
                                                    <img class="img-thumbnail"
                                                        src="{{ asset('storage/' . $photo) }}">
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                        </div>
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

<div wire:ignore.self class="modal fade" role="dialog" id="deleteProductModal" tabindex="-1"
    aria-labelledby="deleteProductModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="destroyProduct">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deletePositionModalLabel">Product</h1>
                </div>
                <div class="modal-body">
                    <h6 class="text-danger">Are you sure you want to delete this product?</h6>
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
