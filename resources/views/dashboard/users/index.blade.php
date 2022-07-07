@extends('layouts.dashboard')

@section('content')
    <h1>顧客一覧</h1>
    <form action="{{ route('dashboard.users.index') }}" method="get" class="w-75">
        <div class="form-inline mt-2 w-75">
            ID・氏名など
            <input type="text" name="keyword" value="{{ $keyword }}" class="form-control w-25 ml-2">
            <button type="submit" class="btn btn-success">検索</button>
        </div>
    </form>
    <div class="row">
        <div class="col-9">
            <div class="table-responsive">
                <table class="table mt-5 text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">氏名</th>
                            <th scope="col">メールアドレス</th>
                            <th scope="col">電話番号</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->tel }}</td>
                                <td>
                                    <form id="logout-form{{ $user->id }}"
                                        action="{{ route('dashboard.users.destroy', $user) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        @if ($user->deleted_flag)
                                            <button type="submit" class="btn btn-gray btn-sm">復帰</button>
                                        @else
                                            <button type="submit" class="btn btn-danger btn-sm">削除</button>
                                        @endif
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">{{ $users->links() }}</div>
        </div>
    </div>
@endsection
