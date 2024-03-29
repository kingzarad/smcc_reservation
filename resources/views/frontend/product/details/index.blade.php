@extends('layouts.user.index')

@section('content')
    <livewire:frontend.collection.details :products="$products" :products_suggest="$products_suggest" />
@endsection
