@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            @component('components.sidebar', compact('categories', 'major_categories'))
            @endcomponent
        </div>
        <div class="col-9 mt-4">
            <div class="container">
                <h1>おすすめ商品</h1>
                <div class="row">
                    @foreach ($recommend_products as $product)
                        <div class="col-sm-6 col-lg-4">
                            <a href="{{ route('products.show', $product) }}">
                                @if ($product->image)
                                    <img src="{{ asset('storage/products/' . $product->image) }}" class="img-thumbnail">
                                @else
                                    <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                                @endif
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <p class="ml-2">
                                        {{ $product->name }}<br>
                                        <label>￥{{ $product->price }}</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <h2>新着商品</h2>
                <div class="row">
                    @foreach ($latest_products as $product)
                        <div class="col-6 col-lg-3">
                            <a href="{{ route('products.show', $product) }}">
                                @if ($product->image)
                                    <img src="{{ asset('storage/products/' . $product->image) }}" class="img-thumbnail">
                                @else
                                    <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                                @endif
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <p class="ml-2">
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
@endsection
