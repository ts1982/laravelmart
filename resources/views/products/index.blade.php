@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="container mt-4">
                <div class="row w-100">
                    @foreach ($products as $product)
                        <div class="col-6 col-lg-4">
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <p class="mt-2 ml-2">
                                        {{ $product->name }}<br>
                                        <label>￥{{ $product->price }}</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('products.create') }}">New</a>
@endsection
