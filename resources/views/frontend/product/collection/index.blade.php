@extends('layouts.user.index')

@section('content')
    @include('frontend.product.collection.banner')

    <livewire:frontend.collection.product :products="$products" :categories="$categories" />


@endsection
