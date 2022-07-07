@extends('layouts.app')

@section('content')
    <div class="container py-5 d-flex justify-content-center">
        <div class="w-75">
            <h1>お気に入り</h1>
            <hr>
            @foreach ($favorites as $favorite)
                @php
                    $product = App\Product::find($favorite->favoriteable_id);
                @endphp
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <a href="{{ route('products.show', $product) }}">
                            @if ($product->image)
                                <img src="{{ asset('storage/products/' . $product->image) }}" class="w-100">
                            @else
                                <img src="{{ asset('img/dummy.png') }}" class="w-100">
                            @endif
                        </a>
                    </div>
                    <div class="col">
                        <p class="h4">{{ $product->name }}</p>
                        <label>￥{{ $product->price }}</label>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('mypage.unfavorite', ['id' => $product->id]) }}">削除</a>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-success">カートに入れる</button>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="d-flex justify-content-center">{{ $favorites->links() }}</div>
        </div>
    </div>
@endsection
