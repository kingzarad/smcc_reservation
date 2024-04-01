<div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        @include('livewire.admin.stocks.stock-in.modal')
        <div class="card-body p-3">
            <h4 class="card-title">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-muted">STOCK-IN MANAGEMENT</h5>
                    <button class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#addStocksModal"><i class="fa fa-plus-square"></i>&nbsp;Add new
                        stocks</button>
                </div>
            </h4>
            <div class="table-responsived">
                <table id="datatable_stock" class="table table-borderless">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th style="width:50px">#</th>
                            <th>Product</th>
                            <th>Total Quantity</th>


                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td></td>
                            <td></td>

                          
                            <td></td>

                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
