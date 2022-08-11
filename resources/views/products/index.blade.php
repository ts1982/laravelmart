@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="sidebar col-2 shadow-sm">
            @component('components.sidebar', compact('categories', 'major_categories'))
            @endcomponent
        </div>
        <div class="col-md-9 my-4">
            <div class="container">
                @if ($category)
                    <a href="/">トップ</a>&nbsp;>&nbsp;
                    <a href="#">{{ $category->major_category->name }}</a>&nbsp;>&nbsp;
                    {{ $category->name }}
                    <h2>{{ $category->name }}の商品一覧&nbsp;{{ $total_count }}件</h2>

                    <form action="{{ route('products.index') }}" method="get" class="form-inline mb-1">
                        <input type="hidden" name="category" value="{{ $category->id }}">
                        <label for="selector">並び替え</label>
                        <select name="sort" id="selector" onChange="this.form.submit();"
                            class="form-select form-inline ml-2">
                            @foreach ($sort as $key => $value)
                                @if ($sorted == $value)
                                    <option value="{{ $value }}" selected>{{ $key }}</option>
                                @else
                                    <option value="{{ $value }}">{{ $key }}</option>
                                @endif
                            @endforeach
                        </select>
                    </form>
                @else
                    <h1>おすすめ商品</h1>
                @endif
                <div class="row normal w-100">
                    @foreach ($products as $product)
                        <div class="col-sm-6 col-lg-4">
                            <a href="{{ route('products.show', $product) }}">
                                @if ($product->image)
                                    <img src="{{ $product->image }}" class="img-thumbnail">
                                    {{-- <img src="{{ asset('storage/products/' . $product->image) }}" class="img-thumbnail"> --}}
                                @else
                                    <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                                @endif
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <p class="ml-2">{{ $product->name }}</p>
                                    <p class="item-price">￥{{ number_format($product->price) }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">{{ $products->appends(request()->query())->links() }}</div>
            </div>
        </div>
    </div>
@endsection
