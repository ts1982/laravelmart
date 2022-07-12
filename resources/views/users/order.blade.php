@extends('layouts.mypage')

@section('content')
    <div class="container py-5 mx-auto">
        <h2 class="text-center mb-5">注文履歴</h2>
        <div class="row">
            <table class="table col-md-8 offset-md-2">
                <thead>
                    <tr>
                        <th>注文番号</th>
                        <th>購入日時</th>
                        <th>合計金額</th>
                        <th>詳細</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order }}</td>
                            <td>{{ App\Cart::where('order_id', $order)->first()->updated_at }}</td>
                            @php
                                $carts = App\Cart::where('order_id', $order)->get();
                                $total_price = 0;
                                foreach ($carts as $cart) {
                                    $total_price += $cart->quantity * $cart->price;
                                }
                            @endphp
                            <td>￥{{ number_format($total_price) }}</td>
                            <td><a href="">詳細を確認する</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
