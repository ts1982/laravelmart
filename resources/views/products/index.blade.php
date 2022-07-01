@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            @component('components.sidebar', compact('categories', 'major_category_names'))
            @endcomponent
        </div>
        <div class="col-9 mt-4">
            <div class="container">
                @if ($category !== null)
                    <a href="/">トップ</a>&nbsp;>&nbsp;
                    <a href="#">{{ $category->major_category_name }}</a>&nbsp;>&nbsp;
                    {{ $category->name }}
                    <h2>{{ $category->name }}の商品一覧&nbsp;{{ $total_count }}件</h2>
                @else
                    <h1>おすすめ商品</h1>
                @endif
                <div class="row w-100">
                    @foreach ($products as $product)
                        <div class="col-6 col-lg-3">
                            <a href="{{ route('products.show', $product) }}">
                                <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <p class="mt-2 ml-2">
                                        {{ $product->name }}<br>
                                        <label>￥{{ $product->price }}</label>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">{{ $products->appends(request()->query())->links() }}</div>
            </div>
            <a href="{{ route('products.create') }}">New</a>
        </div>
    </div>
@endsection
