<div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        @include('livewire.admin.product.modal')
        <div class="card-body p-3">
            <h4 class="card-title">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-muted">PRODUCT MANAGEMENT</h5>
                    <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#addProductModal"><i
                            class="fa fa-plus-square"></i>&nbsp;ADD NEW PRODUCT</button>
                </div>
            </h4>
            <div class="table-responsived">
                <table id="datatable" class="table table-borderless">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th style="width:50px">#</th>
                            <th>Thumbnail</th>
                            <th>Name</th>

                            <th>Small Description</th>
                            <th>Quantity</th>
                            <th>Status</th>

                            <th style="width:160px">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td >

                                    @if ($product->productImages->isNotEmpty())
                                        @php $firstImage = $product->productImages->first(); @endphp
                                        <div class="image-container">
                                            <img class="img-thumbnail" src="{{ asset('storage/' . $firstImage->image) }}" alt="Product Image">
                                        </div>

                                    @endif
                                </td>

                                <td>{{ Str::ucfirst($product->name) }}</td>
                                <td>{{ Str::ucfirst($product->small_description) }}</td>
                                <td style="text-align: center;">{{ $product->quantity }}</td>
                                <td><span
                                        class="badge bg-{{ $product->status == 1 ? 'warning' : 'info' }} ">{{ $product->status == 1 ? 'Hidden' : 'Visible' }}
                                </td>

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
                                                    <button data-bs-toggle="modal" wire:click="editProduct({{$product->id}})" data-bs-target="#updateProductModal" class="btn btn-sm btn-warning "><i
                                                            class="fa fa-pencil-square-o"></i></button>

                                                    <button data-bs-toggle="modal" wire:click="deleteProduct({{$product->id}})" data-bs-target="#deleteProductModal" class="btn btn-sm btn-danger"><i
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
