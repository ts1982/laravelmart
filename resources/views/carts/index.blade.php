@extends('layouts.app')

@section('content')
    <div id="carts_index" class="container row pt-5 mx-auto">
        <div class="col-lg-10 offset-lg-1">
            <h1 class="mb-4">ショッピングカート</h1>
            @if (count($cart) > 0)
                @if (session('warning'))
                    <div class="alert alert-danger">{{ session('warning') }}</div>
                @endif
                <div class="row">
                    <div class="col-lg-2 offset-lg-7">
                        <h4>数量</h4>
                    </div>
                    <div class="col-lg-3">
                        <h4>合計</h4>
                    </div>
                </div>
                <hr>
                @foreach ($cart as $item)
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="{{ route('products.show', App\Product::find($item->product_id)) }}">
                                <img src="{{ $item->product->image }}" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-lg-4">
                            <p>{{ $item->product->name }}</p>
                            <label>¥{{ number_format($item->product->price) }}</label>
                        </div>
                        {{-- <div class="col-lg-2">¥{{ number_format($item->product->price) }}</div> --}}
                        <div class="col-lg-2 col-6">
                            <form action="{{ route('carts.update') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <input type="number" name="qty" oninput="this.form.submit();"
                                        value="{{ $item->quantity }}" id="product-quantity" class="form-control col-7">
                                    <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-2">
                            <h5>¥{{ number_format($item->product->price * $item->quantity) }}</h5>
                        </div>
                        <div class="col-lg-1">
                            <form action="{{ route('carts.destroy') }}" method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                <button type="submit" class="btn btn-danger btn-sm">削除</button>
                            </form>
                        </div>
                    </div>
                    <hr>
                @endforeach
                <div class="row">
                    <div class="col-lg-2 offset-lg-7">
                        <h3>合計</h3>
                    </div>
                    <div class="col-lg-3">
                        <h3>￥{{ number_format($total_price) }}</h3>
                        <small>※表示価格は税込です</small>
                    </div>
                </div>

                <!-- Button trigger modal -->
                <div class="text-right mt-4">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                        購入する
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">購入画面</h5>
                            </div>
                            <div class="modal-body">
                                購入を確定してよろしいですか？
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                <form action="{{ route('carts.order') }}" method="post" class="text-right">
                                    @csrf
                                    <button type="sumbit" class="btn btn-success">確定する</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @else
                    <div class="alert alert-warning">カートは空です。</div>
                @endif
            @endif
            <a href="/">トップページに戻る</a>
        </div>
    </div>
@endsection
