@extends('layouts.dashboard')

@section('content')
    <div class="pt-5 w-75">
        <h1>商品登録</h1>

        <form action="{{ route('dashboard.products.update', $product) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="product-name">商品名</label>
                <input type="text" name="name" value="{{ $product->name }}" id="product-name" class="form-control">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="product-description">商品説明</label>
                <textarea name="description" id="product-description" class="form-control">{{ $product->description }}</textarea>
                @error('description')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="product-price">価格</label>
                <input type="numer" name="price" value="{{ $product->price }}" id="product-price"
                    class="form-control">
                @error('price')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="product-category">カテゴリ</label>
                <select name="category_id" id="product-category" class="form-control">
                    @foreach ($categories as $category)
                        @if ($category->id == $product->category_id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="product-image" class="mr-3">画像</label>
                @if ($product->image)
                    <img src="{{ asset('storage/products/' . $product->image) }}" id="product-image-preview"
                        class="w-25">
                @else
                    <img src="{{ asset('public/dummy.png') }}" id="product-image-preview">
                @endif
                <div class="d-flex flex-column">
                    <small>600ox × 600px推奨。<br>商品の魅力が伝わる画像をアップロードしてください。</small>
                    <label for="product-image" class="btn btn-success w-25 mt-2">画像を選択</label>
                    <input type="file" name="image" id="product-image" onchange="handleImage(this.files)"
                        style="display: none">
                </div>
            </div>
            <button type="submit" class="btn btn-success">更新</button>
        </form>

        <a href="/dashboard/products" class="d-inline-block mt-2">商品一覧に戻る</a>
    </div>

    <script>
        function handleImage(image) {
            let reader = new FileReader();
            reader.onload = function() {
                let imagePreview = document.getElementById('product-image-preview');
                imagePreview.src = reader.result;
            }
            console.log(image);
            reader.readAsDataURL(image[0]);
        }
    </script>
@endsection
