<div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        @include('livewire.admin.stocks.stock-in.modal')
        <div class="card-body p-3">
            <h4 class="card-title">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-muted">STOCK-IN MANAGEMENT</h5>
                    <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#addStocksModal"><i
                            class="fa fa-plus-square"></i>&nbsp;Add new
                        stocks</button>
                </div>
            </h4>
            <form wire:submit.prevent="saveStock">
                <div class="row">
                    <div class="col-sm-12 ">
                        <div class="row">
                            <div class="col-sm-4 ">
                                <div class=" d-flex justify-content-start align-items-center">
                                    <div class="me-3">
                                        <label for="name" class="form-label">Reference #</label>
                                        <input readonly type="text" wire:model="stockref" class="form-control"
                                            id="stockref">

                                    </div>
                                    <button type="button" wire:click="generateRef"
                                        class="btn btn-primary  mt-5">Generate</button>
                                </div>
                                <div class="">
                                    <label for="name" class="form-label">Stock By</label>
                                    <input type="text" wire:model="stockby" class="form-control "
                                        style="width: 300px !important" id="stockby">

                                </div>

                            </div>
                            <div class="col ">

                                <div class="mt-3">
                                    <label for="name" class="form-label">Stock Date</label>
                                    <input type="date" wire:model="stockdate" class="form-control "
                                        style="width: 300px !important" id="stockdate">

                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-sm-12">
                        <hr>
                        <div class="table-responsived">
                            <table id="datatable_stock" class="table table-borderless">
                                <thead class="bg-gradient-primary text-white">
                                    <tr>
                                        <th style="width:50px">#</th>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stockinList as $list)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $list->product->name }}</td>
                                            <td>
                                                <input class="form-control" style="width: 100px" type="number"
                                                    min="0" max="500" value="0"
                                                    wire:model="quantities.{{ $list->product_id .'-'.$list->id }}">
                                            </td>
                                            <td>

                                                <button type="button"  wire:click="removeStockProduct({{$list->id}})" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-times"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-primary" {{ $btn_stat == false ? 'disabled' : ''}}>Save Stock</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
