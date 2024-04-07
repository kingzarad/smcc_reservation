<div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <h4 class="card-title">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="m-0 font-weight-bold text-muted">STOCK-IN HISTORY</h5>

                </div>
            </h4>
            <div class="table-responsived">
                <table id="datatable" class="table table-borderless">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th style="width:50px">#</th>
                            <th>Stock Ref</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Entry Date</th>
                            <th>Stock By</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stockinList as $list)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{$list->stockref}}</td>
                                <td>{{$list->product->name}}</td>
                                <td>{{$list->quantity}}</td>
                                <td>{{$list->entry_date}}</td>
                                <td>{{$list->stock_by}}</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
