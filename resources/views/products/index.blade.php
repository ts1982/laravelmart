@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-2">
            @component('components.sidebar', compact('categories', 'major_category_names'))
            @endcomponent
        </div>
        <div class="col-9">
            <div class="container">
                @if ($category !== null)
                    <a href="/products">トップ</a>&nbsp;>&nbsp;
                    <a href="#">{{ $category->major_category_name }}</a>&nbsp;>&nbsp;
                    {{ $category->name }}
                    <h1>{{ $category->name }}の商品一覧&nbsp;{{ $total_count }}件</h1>
                @endif
                <div class="row w-100">
                    @foreach ($products as $product)
                        <div class="col-6 col-lg-4">
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
            </div>
            <a href="{{ route('products.create') }}">New</a>
        </div>
    </div>
@endsection
