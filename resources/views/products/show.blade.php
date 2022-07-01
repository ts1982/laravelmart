@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="row w-75 mt-5">
            <div class="col-5 offset-1">
                <img src="{{ asset('img/dummy.png') }}" class="w-100 img-fluid">
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
                                <a href="" class="btn btn-outline-primary w-100">
                                    <i class="fas fa-heart mr-1"></i>お気に入り
                                </a>
                            </div>
                        </div>
                    </form>
                @endauth
            </div>
            <div class="offset-1 col-11">
                <hr>
                <h3>カスタマーレビュー</h3>
            </div>
        </div>
    </div>
    <a href="{{ route('products.edit', $product) }}">Edit</a>
    <form action="{{ route('products.destroy', $product) }}" method="post">
        @csrf
        @method('delete')
        <input type="submit" value="Delete">
    </form>
    <a href="/products">Back</a>
@endsection
