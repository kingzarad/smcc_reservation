@extends('layouts.admin.index')
@section('content')
    <div class="row">
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
                                    <th>Date Filled</th>

                                    <th>Status</th>

                                    <th style="width:160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($travelList as $pendingList)
                                    <tr>
                                        <td>{{$pendingList->id}} </td>
                                        <td>
                                            <a href="{{ asset('storage/' . $pendingList->image) }}" target="_blank">
                                                <div class="image-container">
                                                    <img class="img-thumbnail"
                                                        src="{{ asset('storage/' . $pendingList->image) }}" alt="Product Image">
                                                </div>
                                            </a>
                                        </td>
                                        <td></td>
                                        <td>{{$pendingList->created_at}} </td>

                                        <td>
                                            <span
                                            class="badge bg-{{ $pendingList->status == 1 ? 'warning' : 'success' }} ">{{ $pendingList->status == 1 ? 'Pending' : 'Accpepted' }}
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
                                                            <a href="" class="btn btn-sm btn-warning "><i
                                                                    class="fa fa-pencil-square-o"></i></a>
                                                            <button onclick="" class="btn btn-sm btn-danger"><i
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
    </div>
@endsection
