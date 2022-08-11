@extends('layouts.mypage')

@section('content')
    <div id="order_show" class="row py-5 mx-auto justify-content-center">
        <div class="col-md-11 offset-md-1 p-0">
            <a href="/mypage">マイページ</a>&nbsp;>&nbsp;
            <a href="/mypage/cart_history">注文履歴</a>&nbsp;>&nbsp;注文履歴
            <h2 class="text-center mb-5 mt-3">注文履歴詳細</h2>
            <div class="row">
                <div class="col-md-12 p-0">
                    <h3 class="text-center">ご注文情報</h3>
                    <hr>
                    <div class="col-md-8 offset-md-2">
                        <div class="row">
                            <div class="col-md-6">
                                注文番号
                            </div>
                            <div class="col-md-6">
                                {{ $order_id }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                注文日時
                            </div>
                            <div class="col-md-6">
                                {{ $updated_at }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                合計金額
                            </div>
                            <div class="col-md-6">
                                {{ number_format($total_price) }}円
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                点数
                            </div>
                            <div class="col-md-6">
                                {{ $count }}点
                            </div>
                        </div>
                    </div>
                    <hr>
                    @foreach ($carts as $cart)
                        <div class="row img-order">
                            <div class="col-md-5">
                                @if ($cart->image)
                                    <img src="{{ $cart->image }}" class="img-thumbnail">
                                @else
                                    <img src="{{ asset('img/dummy.png') }}" class="img-thumbnail">
                                @endif
                            </div>
                            <div class="col-md-7">
                                <h4 class="mt-1 ml-2">{{ $cart->name }}</h4>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        数量
                                    </div>
                                    <div class="col-6">
                                        {{ $cart->quantity }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        単価
                                    </div>
                                    <div class="col-6">
                                        ￥{{ number_format($cart->price) }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4 text-center">
                                        合計
                                    </div>
                                    <div class="col-6">
                                        ￥{{ number_format($cart->quantity * $cart->price) }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
