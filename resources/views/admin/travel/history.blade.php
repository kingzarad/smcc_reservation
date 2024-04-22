@extends('layouts.admin.index')
@section('content')
    <div class="row">
        <style>
            .bg-success {
                background: #3F8E4E !important;
            }
        </style>
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <h4 class="card-title">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0 font-weight-bold text-muted">TRAVEL ORDER MANAGEMENT</h5>
                        </div>
                    </h4>
                    <div class="table-responsived">
                        <table id="datatable" class="table table-borderless">
                            <thead class="bg-gradient-primary text-white">
                                <tr>
                                    <th style="width:50px">#</th>
                                    <th>Travel Order</th>
                                    <th>Name</th>
                                    <th>Note (Optional)</th>
                                    <th>Date Filled</th>

                                    <th>Status</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($travelList as $pendingList)
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
                                        <td>{{ $pendingList->usersInfo->username }}</td>
                                        <td>{{ $pendingList->note }}</td>
                                        <td>{{ $pendingList->created_at }} </td>

                                        <td>
                                            @if ($pendingList->status == 1)
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif ($pendingList->status == 2)
                                            <span class="badge bg-danger">Declined</span>
                                            @else
                                                <span class="badge bg-success">Approved</span>
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
    </div>
@endsection
