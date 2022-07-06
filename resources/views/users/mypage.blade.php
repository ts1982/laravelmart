@extends('layouts.app')

@section('content')
    <div class="row pt-5">
        <div class="col-2">
            <h2 class="text-center mb-4">Menu List</h2>
            <ul>
                <li class="mb-2">
                    <a href="{{ route('mypage.edit') }}">会員情報の編集</a>
                </li>
                <li class="mb-2">
                    <a href="">注文履歴</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('mypage.edit_password') }}">パスワード変更</a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('ログアウト') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
        <div class="col-4 offset-2">
            <h1>マイページ</h1>
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
