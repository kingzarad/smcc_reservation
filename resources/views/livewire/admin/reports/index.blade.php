<div class="card">
    <div class="card-body p-3">
        <h4 class="card-title">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold ">RESERVATION REPORTS</h5>
            </div>
        </h4>
        <hr>
        <div class="row mt-2 g-3">

            <div class="col-lg-auto row">

                <div class="col-auto ">
                    <label class="form-control-plaintext">Month:</label>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm p-1">
                        <select class="form-select" id="hhmonth" style="width:12em">
                            <option value="all">All</option>

                        </select>
                    </div>
                </div>
                <div class="col-auto ">
                    <label class="form-control-plaintext">Status:</label>
                </div>
                <div class="col-auto">
                    <div class="input-group input-group-sm p-1">
                        <select class="form-select" id="hhsemester" style="width:12em">
                            <option value="all">All</option>
                            <option value="1">Approved</option>
                            <option value="2">Cancelled</option>
                        </select>
                    </div>
                </div>


            </div>


        </div>
        <hr>
        <div id="printContainer">

            <div class="table-responsived">
                <table id="datatable_report" class="table table-borderless w-100">
                    <thead class="bg-gradient-primary text-white">
                        <tr>
                            <th>No.</th>
                            <th class="d-noxne ">REFERENCE NO.</th>
                            <th>PRODUCT NAME</th>
                            <th>DATE</th>
                            <th>STATUS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reserv as $index => $item)
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->reference_num ?? '' }}</td>
                                <td>{{ $item->product_name ?? '' }}</td>
                                <td>{{ $item->date ?? '' }}</td>
                                <td>
                                    @if ($item->status == 0)
                                        <p class="bg-warning btn btn-sm text-white">PENDING</p>
                                    @elseif($item->status == 2)
                                        <p class="bg-danger btn btn-sm text-white">CANCELLED</p>
                                    @else
                                        <p class="bg-success btn btn-sm text-white">APPROVED</p>
                                    @endif

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
