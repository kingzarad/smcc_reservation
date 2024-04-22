@extends('layouts.user.index')

@section('content')
    @include('frontend.reserved.banner')
    @livewire('frontend.reserved.index');   
@endsection
