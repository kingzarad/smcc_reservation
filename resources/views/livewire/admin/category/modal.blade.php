{{-- Modal Category --}}
<div wire:ignore.self class="modal fade" role="dialog" id="addCategoryModal" tabindex="-1"
    aria-labelledby="addCategoryModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form wire:submit.prevent="saveCategory">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addCategoryModalLabel">Add Category</h1>
                </div>
                <div class="modal-body">
                    @include('shared.loading')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model="name" class="form-control" id="category_name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>

                    <div class="mb-2">
                        <label for="photos" class="form-label">Photos</label>

                        <input class="form-control" type="file" wire:model="photos" accept=".jpg, .jpeg, .png">
                        @error('photos')
                            <small class="text-danger">{{ $message }}</small>
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
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="status" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Visibility Status
                            </label>
                        </div>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary " wire:loading.class="opacity-50">Save
                        changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div wire:ignore.self class="modal fade" role="dialog" id="updateCategoryModal" tabindex="-1"
    aria-labelledby="updateCategoryModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="updateCategory">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="updateCategoryModalLabel">Update Category</h1>
                </div>
                <div class="modal-body">
                    @include('shared.loading')

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" wire:model="name" class="form-control" id="category_name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div>
                    <div class="mb-2">
                        <label for="photos" class="form-label">Photos</label>

                        <input class="form-control" type="file" wire:model="photos" accept=".jpg, .jpeg, .png">
                        @error('photos')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mt-3">
                            @if ($photos)
                                <div class="col-md-3 mb-2">
                                    <div class="image-container">
                                        <img class="img-thumbnail" src="{{ $photos->temporaryUrl() }}">
                                    </div>
                                </div>
                            @elseif ($photos_display)
                                <div class="col-md-3 mb-2">
                                    <div class="image-container">
                                        <img class="img-thumbnail" src="{{ asset('storage/' . $photos_display) }}">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="status" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Visibility Status
                            </label>
                        </div>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" wire:click="closeModal"
                        data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary " wire:loading.class="opacity-50">Save
                        changes</button>
                </div>
            </div>
        </form>

    </div>
</div>

<div wire:ignore.self class="modal fade" role="dialog" id="deleteCategoryModal" tabindex="-1"
    aria-labelledby="deleteCategoryModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog ">
        <form wire:submit.prevent="destroyCategory">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="deleteCategoryModalLabel">Category</h1>
                </div>
                <div class="modal-body">
                    <h6 class="text-danger">Are you sure you want to delete this category?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-danger">Yes</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- Category End --}}
@script
    <script>
        function updateSlug() {
            const nameInput = document.getElementById('category_name');
            const slugInput = document.getElementById('category_slug');

            nameInput.addEventListener('input', function() {
                const name = nameInput.value.trim(); // Trim whitespace from the beginning and end
                const spaceIndex = name.indexOf(' ');
                let slug;

                if (spaceIndex === -1) {
                    slug = name.toLowerCase(); // No space found, use the entire name
                } else {
                    // Replace spaces with hyphens
                    slug = name.toLowerCase().replace(/\s+/g, '-');
                }

                slugInput.value = slug;
            });
        }

        document.addEventListener('livewire:init', () => {
            alert(0);
            updateSlug();
        });
    </script>
@endscript
