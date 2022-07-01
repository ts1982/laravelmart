@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <h1>商品情報更新</h1>

        <form action="{{ route('products.update', $product) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="product-name">商品名</label>
                <input type="text" name="name" id="product-name" class="form-control" value="{{ $product->name }}">
            </div>
            <div class="form-group">
                <label for="product-description">商品説明</label>
                <textarea name="description" id="product-description" class="form-control">{{ $product->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="product-price">価格</label>
                <input type="numer" name="price" id="product-price" class="form-control"
                    value="{{ $product->price }}">
            </div>
            <div class="form-group">
                <label for="product-category">カテゴリ</label>
                <select name="category_id" id="product-category" class="form-control">
                    @foreach ($categories as $category)
                        @if ($category->id === $product->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-danger">更新</button>
        </form>

        <a href="/products" class="d-inline-block mt-2">商品一覧に戻る</a>
    </div>
@endsection
