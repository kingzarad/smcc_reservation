@extends('layouts.admin.index')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            <div class="card">
                <div class="card-body p-3">
                    <h4 class="card-title">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="m-0 font-weight-bold text-muted">USERS MANAGEMENT</h5>
                            <a href="" class="btn bg-gradient-primary d-none"><i class="fa fa-plus-square"></i>&nbsp;ADD
                                NEW RESOURCE</a>
                        </div>
                    </h4>
                    <div class="table-responsived">
                        <table id="datatable" class="table table-borderless">
                            <thead class="bg-gradient-primary text-white">
                                <tr>
                                    <th style="width:50px">#</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th style="width:160px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usersList as $list)
                                    <tr>
                                        <td>{{ $list->id}}</td>
                                        <td>{{ $list->username}}</td>
                                        <td>{{ $list->email}}</td>
                                        <td><span
                                            class="badge bg-{{ $list->user_status == 1 ? 'warning' : 'success' }} ">{{ $list->user_status == 1 ? 'Pending' : 'Granted' }}
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