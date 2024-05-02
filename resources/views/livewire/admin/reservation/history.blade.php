<div class="card">
    @include('livewire.admin.reservation.modal_history')
    <style>
        .bg-success {
            background: #3F8E4E !important;
        }
    </style>
    <div class="card-body p-3">
        <h4 class="card-title">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="m-0 font-weight-bold text-muted">RESERVATION MANAGEMENT</h5>
            </div>
        </h4>
        <div class="table-responsived">
            <table id="datatable" class="table table-borderless">
                <thead class="bg-gradient-primary text-white">
                    <tr>

                        <th>Department</th>
                        <th>Instructor Name</th>
                        <th>Date Filled</th>

                        <th>Status</th>

                        <th style="width:160px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservationlists as $index => $item)
                        <tr>

                            <td>{{ $item->departname }}</td>
                            <td> {{ $item->name }} </td>
                            <td>{{ \Carbon\Carbon::parse($item->date_filled)->format('F j, Y') }}</td>

                            <td>
                                @if ($item->status == 0)
                                    <p class="bg-warning btn btn-sm text-white">PENDING</p>
                                @elseif($item->status == 2)
                                    <p class="bg-danger btn btn-sm text-white">CANCELLED</p>
                                @elseif($item->status == 3)
                                    <p class="bg-success btn btn-sm text-white">COMPLETED</p>
                                @else
                                    <p class="bg-success btn btn-sm text-white">APPROVED</p>
                                @endif
                            </td>
                            <td>
                                <button data-bs-toggle="modal" wire:click="showSingle({{ $item->id }})"
                                    data-bs-target="#showHistory"class="btn btn-sm btn-info">
                                    <i class="fa-regular fa-eye"></i>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



</div>
