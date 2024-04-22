<div class="table-responsived">
    <style>
        .btn-success {
            background: #3F8E4E !important;
        }
    </style>
    <table id="datatable" class="table table-borderless">
        <thead class="bg-gradient-primary text-white">
            <tr>
                <th style="width:50px">#</th>
                <th>Travel Order</th>
                <th>Name</th>
                <th>Note (Optional)</th>
                <th>Date Filled</th>

                <th>Status</th>

                <th style="width:160px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($travelPendingList as $pendingList)
                <tr>
                    <td>{{ $pendingList->id }} </td>
                    <td>
                        <a href="{{ asset('storage/' . $pendingList->image) }}" target="_blank">
                            <div class="image-container">
                                <img class="img-thumbnail"
                                    src="{{ asset('storage/' . $pendingList->image) }}"
                                    alt="Product Image">
                            </div>
                        </a>
                    </td>
                    <td>{{ $pendingList->usersDetails->username }}</td>
                    <td>{{ $pendingList->note }}</td>
                    <td>{{ $pendingList->created_at }} </td>

                    <td>
                        <span
                            class="badge bg-{{ $pendingList->status == 1 ? 'warning' : 'success' }} ">{{ $pendingList->status == 1 ? 'Pending' : 'Accpepted' }}
                    </td>
                    <td>
                        <div class="d-flex justify-content-between">
                            <button onclick="" class="btn btn-sm btn-success">
                                <i class="fa-regular fa-thumbs-up"></i>
                            </button>
                            <button onclick="" class="btn btn-sm btn-danger">
                                <i class="fa-regular fa-thumbs-down"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
</div>
