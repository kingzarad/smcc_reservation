@extends('layouts.user.index')

@section('content')

    @include('frontend.hero.index')
    @livewire('frontend.calendar.index')
    @include('frontend.product.index')
    @include('frontend.category.index')


@endsection
