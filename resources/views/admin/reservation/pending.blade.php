@extends('layouts.admin.index')
@section('content')
    <div class="row">
        <div class="col-xl-12 col-sm-6 mb-xl-0 mb-4">
            @livewire('admin.reservation.pending')
        </div>
    </div>
@endsection
