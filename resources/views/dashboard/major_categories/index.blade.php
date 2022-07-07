@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-9">
            <h1>親カテゴリ管理</h1>
            <div class="container pt-2">
                <form action="/dashboard/major_categories" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="a" class="form-label">親カテゴリ名</label>
                        <input type="text" name="name" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="b" class="form-label">親カテゴリの説明</label>
                        <textarea name="description" class="form-control"></textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mb-3">新規作成</button>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">親カテゴリ</th>
                            <td scope="col"></td>
                            <td scope="col"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($major_categories as $major_category)
                            <tr>
                                <th>{{ $major_category->id }}</th>
                                <td>{{ $major_category->name }}</td>
                                <td><a href="{{ route('dashboard.major_categories.edit', $major_category) }}"
                                        class="link-success">編集</a></td>
                                <td>
                                    <a href="{{ route('dashboard.major_categories.destroy', $major_category) }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form{{ $major_category->id }}').submit();"
                                        class="link-gray">削除</a>
                                    <form id="logout-form{{ $major_category->id }}"
                                        action="{{ route('dashboard.major_categories.destroy', $major_category) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">{{ $major_categories->links() }}</div>
            </div>
        </div>
    </div>
@endsection
