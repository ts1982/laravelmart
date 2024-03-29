@extends('layouts.app')

@section('content')
    <div class="d-md-flex my-5">
        <div class="row justify-content-center my-5">
            <div class="col-md-4 offset-md-1 my-4">
                @if ($product->image)
                    <img src="{{ $product->image }}" class="w-100 img-fluid">
                    {{-- <img src="{{ asset('storage/products/' . $product->image) }}" class="w-100 img-fluid"> --}}
                @else
                    <img src="{{ asset('img/dummy.png') }}" class="w-100 img-fluid">
                @endif
            </div>
            <div class="col-md-5 mt-4">
                <div class="d-flex flex-column">
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                    <hr>
                    <h4 class="d-flex align-items-end">￥{{ number_format($product->price) }}（税込）</h5>
                        <hr>
                </div>
                @auth
                    <form action="{{ route('carts.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <div class="form-group row">
                            <label for="quantity" class="col-2 col-form-label">数量</label>
                            <div class="col-10">
                                <input type="number" id="quantity" name="qty" min="1" value="1"
                                    class="form-control w-25">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7 mt-3">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-shopping-cart mr-1"></i>カートに追加
                                </button>
                            </div>
                            <div class="col-md-5 mt-3">
                                @if ($product->isFavoritedBy(Auth::user()))
                                    <a href="{{ route('products.favorite', $product) }}" class="btn btn-outline-primary w-100">
                                        <i class="fas fa-heart mr-1"></i>お気に入り解除
                                    </a>
                                @else
                                    <a href="{{ route('products.favorite', $product) }}" class="btn btn-outline-primary w-100">
                                        <i class="fas fa-heart mr-1"></i>お気に入り
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                @endauth
            </div>
            <div class="offset-md-1 col-md-9">
                <hr>
                <h3>カスタマーレビュー</h3>
            </div>
            <div class="offset-md-1 col-md-9">
                <div class="row">
                    @foreach ($reviews as $review)
                        <div class="offset-md-5 col-md-7">
                            <h3 class="review-score">{{ str_repeat('★', $review->score) }}</h3>
                            <p class="h3">{{ $review->content }}</p>
                            <h4>{{ $review->user->name }}</h4>
                            <label>{{ $review->created_at }}</label>
                        </div>
                    @endforeach
                </div>

                @auth
                    <div class="row">
                        <div class="offset-md-5 col-md-7">
                            <form action="{{ route('review.store', $product) }}" method="post">
                                @csrf
                                <h4>評価</h4>
                                <select name="score" class="form-control ml-2 review-score">
                                    <option value="1" class="review-score">★</option>
                                    <option value="2" class="review-score">★★</option>
                                    <option value="3" class="review-score" selected>★★★</option>
                                    <option value="4" class="review-score">★★★★</option>
                                    <option value="5" class="review-score">★★★★★</option>
                                </select>
                                <h4>レビュー内容</h4>
                                <textarea name="content" class="form-control m-2"></textarea>
                                <button type="submit" class="btn btn-success ml-2">レビューを追加</button>
                            </form>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
@endsection
