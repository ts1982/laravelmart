@extends('layouts.dashboard')

@section('content')
    <h1>商品管理</h1>
    <form action="{{ route('dashboard.products.index') }}" method="get" class="w-75">
        <div class="form-inline">
            並べ替え
            <select name="sort" onChange="this.form.submit();" class="ml-2">
                <option value="">選択してください</option>
                @foreach ($sort as $key => $value)
                    @if ($sorted == $value)
                        <option value="{{ $value }}" selected>{{ $key }}</option>
                    @else
                        <option value="{{ $value }}">{{ $key }}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-inline mt-2 w-75">
            商品ID・商品名
            <input type="text" name="keyword" value="{{ $keyword }}" class="form-control w-25 ml-2">
            <button type="submit" class="btn btn-success">検索</button>
        </div>
    </form>
    <div class="d-flex justify-content-between w-75 mt-4">
        <h3>合計{{ $total_count }}件</h3>
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-success">新規作成</a>
    </div>
    <div class="row">
        <div class="col-9">
            <div class="table-responsive">
                <table class="table mt-5 text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">画像</th>
                            <th scope="col">商品名</th>
                            <th scope="col">価格</th>
                            <th scope="col">カテゴリ名</th>
                            <th scope="col">親カテゴリ名</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $product->id }}</th>
                                <td class="w-25"><img src="{{ asset('img/dummy.png') }}" class="w-100"></td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->category->major_category->name }}</td>
                                <td>
                                    <a href="{{ route('dashboard.products.edit', $product) }}">編集</a>
                                </td>
                                <td>
                                    <a href="{{ route('dashboard.products.destroy', $product) }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form{{ $product->id }}').submit();"
                                        class="link-gray">削除</a>
                                    <form id="logout-form{{ $product->id }}"
                                        action="{{ route('dashboard.products.destroy', $product) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">{{ $products->links() }}</div>
        </div>
    </div>
@endsection
