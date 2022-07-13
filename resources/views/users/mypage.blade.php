@extends('layouts.mypage')

@section('content')
    <div class="row py-5">
        <div class="col-md-8 offset-md-2">
            <h1 class="text-center">マイページ</h1>
            <table class="table mt-5">
                <thead>
                    <th scope="col" class="border-top-0"></th>
                    <th scope="col" class="border-top-0">会員情報</th>
                    <th scope="col" class="border-top-0"></th>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">氏名</th>
                        <td colspan="2">{{ $user->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">メールアドレス</th>
                        <td colspan="2">{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">郵便番号</th>
                        <td colspan="2">{{ $user->postal }}</td>
                    </tr>
                    <tr>
                        <th scope="row">住所</th>
                        <td colspan="2">{{ $user->address }}</td>
                    </tr>
                    <tr>
                        <th scope="row">電話番号</th>
                        <td colspan="2">{{ $user->tel }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
