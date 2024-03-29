@extends('layouts.app')

@section('content')
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <h1>お気に入り</h1>
            <hr>
            @if (count($products) === 0)
                <div class="alert alert-warning">お気に入りがありません。</div>
            @endif
            @foreach ($products as $product)
                <div class="row align-items-center">
                    <div class="col-md-3 favorite">
                        <a href="{{ route('products.show', $product) }}">
                            @if ($product->image)
                                <img src="{{ $product->image }}" class="img-thumbnail">
                                {{-- <img src="{{ asset('storage/products/' . $product->image) }}" class="w-100"> --}}
                            @else
                                <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                            @endif
                        </a>
                    </div>
                    <div class="col">
                        <p class="h4">{{ $product->name }}</p>
                        <label>￥{{ number_format($product->price) }}</label>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('mypage.unfavorite', ['id' => $product->id]) }}">削除</a>
                    </div>
                    <div class="col-md-2">
                        <form action="{{ route('carts.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="price" value="{{ $product->price }}">
                            <input type="hidden" name="qty" value="1">
                            <button type="submit" class="btn btn-success">カートに入れる</button>
                        </form>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="d-flex justify-content-center">{{ $products->links() }}</div>
        </div>
    </div>
@endsection
