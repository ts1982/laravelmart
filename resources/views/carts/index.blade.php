@extends('layouts.app')

@section('content')
    <div class="container row pt-5 mx-auto">
        <div class="col-lg-10 offset-lg-1">
            @if (count($cart))
                @if (session('warning'))
                    <div class="alert alert-danger">{{ session('warning') }}</div>
                @endif
                @foreach ($cart as $item)
                    <div class="row align-items-center">
                        <div class="col-lg-3">
                            <a href="{{ route('products.show', App\Product::find($item->product_id)) }}">
                                <img src="{{ asset('storage/products/' . $item->product->image) }}" class="img-thumbnail">
                            </a>
                        </div>
                        <div class="col-lg-4">{{ $item->product->name }}</div>
                        <div class="col-lg-3">
                            <form action="{{ route('carts.update') }}" method="post">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <label for="product-quantity" class="col-form-label col-4">数量</label>
                                    <input type="number" name="qty" oninput="this.form.submit();"
                                        value="{{ $item->quantity }}" id="product-quantity" class="form-control col-4">
                                    <input type="hidden" name="product_id" value="{{ $item->product_id }}">
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-1">
                            ¥{{ $item->product->price * $item->quantity }}
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
                {{-- <form action="{{ route('carts.order') }}" method="post" class="text-right">
                    @csrf
                    <button type="sumbit" class="btn btn-success">購入を確定する</button>
                </form> --}}
                <!-- Button trigger modal -->
                <div class="text-right">
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
                <div class="alert alert-warning">カートは空です。</div>
            @endif
            <a href="/">トップページに戻る</a>
        </div>
    </div>
@endsection
