<div wire:ignore.self class="modal fade" role="dialog" id="addStocksModal" tabindex="-1"
    aria-labelledby="addProductModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addProductModalLabel">Product List</h1>
                </div>
                <div class="modal-body">
                    <div class="table-responsived">
                        <table id="datatable_stock_modal" class="table table-borderless">
                            <thead class="bg-gradient-primary text-white">
                                <tr>
                                    <th style="width:50px">#</th>
                                    <th>Thumbnail</th>
                                    <th>Name</th>

                                    <th>Small Description</th>
                                    <th>Quantity</th>

                                    <th>Action</th>
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


                                        <td>

                                            <button  wire:click="addStockProduct({{$product->id}})" class="btn btn-sm btn-primary"><i
                                                class="fa fa-plus"></i></button>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="closeModal" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>

                </div>
            </div>

    </div>
</div>
