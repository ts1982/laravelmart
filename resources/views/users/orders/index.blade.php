@extends('layouts.mypage')

@section('content')
    <div class="col-md-8 offset-md-2 mt-5">
        <a href="/mypage">マイページ</a>&nbsp;>&nbsp;注文履歴
    </div>
    <h2 class="text-center mb-5 mt-3">注文履歴</h2>
    <div class="row">
        <table class="table col-md-8 offset-md-2">
            <thead>
                <tr>
                    <th>注文番号</th>
                    <th>購入日時</th>
                    <th>合計金額</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order_id = $order['order_id'] }}</td>
                        <td>{{ $order['updated_at'] }}</td>
                        <td>￥{{ number_format($order['total_price']) }}</td>
                        <td><a href="{{ route('mypage.cart_show', compact('order_id')) }}">詳細</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
