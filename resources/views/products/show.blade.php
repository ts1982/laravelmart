@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="row w-75 mt-5">
            <div class="col-5 offset-1">
                @if ($product->image)
                    <img src="{{ asset('storage/products/' . $product->image) }}" class="w-100 img-fluid">
                @else
                    <img src="{{ asset('img/dummy.png') }}" class="w-100 img-fluid">
                @endif
            </div>
            <div class="col">
                <div class="d-flex flex-column">
                    <h1>{{ $product->name }}</h1>
                    <p>{{ $product->description }}</p>
                    <hr>
                    <p class="d-flex align-items-end">￥{{ $product->price }}（税込）</p>
                    <hr>
                </div>
                @auth
                    <form action="" method="post">
                        @csrf
                        <div class="form-group row">
                            <label for="quantity" class="col-2 col-form-label">数量</label>
                            <div class="col-10">
                                <input type="number" id="quantity" name="qty" min="1" value="1"
                                    class="form-control w-25">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <button type="submit" class="btn btn-success w-100">
                                    <i class="fas fa-shopping-cart mr-1"></i>カートに追加
                                </button>
                            </div>
                            <div class="col-5">
                                @if ($product->isFavoritedBy(Auth::user()))
                                    <a href="{{ route('products.favorite', $product) }}"
                                        class="btn btn-outline-primary w-100">
                                        <i class="fas fa-heart mr-1"></i>お気に入り解除
                                    </a>
                                @else
                                    <a href="{{ route('products.favorite', $product) }}"
                                        class="btn btn-outline-primary w-100">
                                        <i class="fas fa-heart mr-1"></i>お気に入り
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                @endauth
            </div>
            <div class="offset-1 col-11">
                <hr>
                <h3>カスタマーレビュー</h3>
            </div>
            <div class="offset-1 col-9">
                <div class="row">
                    @foreach ($reviews as $review)
                        <div class="offset-md-5 col-md-5">
                            <h3 class="review-score">{{ str_repeat('★', $review->score) }}</h3>
                            <p class="h3">{{ $review->content }}</p>
                            <h4>{{ $review->user->name }}</h4>
                            <label>{{ $review->created_at }}</label>
                        </div>
                    @endforeach
                </div>

                @auth
                    <div class="row">
                        <div class="offset-md-5 col-md-5">
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
