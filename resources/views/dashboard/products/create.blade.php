@extends('layouts.dashboard')

@section('content')
    <div class="pt-5 w-75">
        <h1>商品登録</h1>

        <form action="{{ route('dashboard.products.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="product-name">商品名</label>
                <input type="text" name="name" id="product-name" class="form-control">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="product-description">商品説明</label>
                <textarea name="description" id="product-description" class="form-control"></textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="product-price">価格</label>
                <input type="numer" name="price" id="product-price" class="form-control">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="product-category">カテゴリ</label>
                <select name="category_id" id="product-category" class="form-control">
                    <option value="">カテゴリを選択してください</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">商品を登録</button>
        </form>

        <a href="/dashboard/products" class="d-inline-block mt-2">商品一覧に戻る</a>
    </div>
@endsection
