@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-9">
            <h1>カテゴリ管理</h1>
            <div class="container pt-2">
                <form action="/dashboard/categories" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="a" class="form-label">カテゴリ名</label>
                        <input type="text" name="name" value="{{ old('name') }}" id="a" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="b" class="form-label">カテゴリの説明</label>
                        <input type="text" name="description" value="{{ old('description') }}" id="b" class="form-control">
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="c" class="form-label">親カテゴリ名</label>
                        <select name="major_category_id" class="form-control" id="c">
                            <option value="">選択してください</option>
                            @foreach ($major_categories as $major_category)
                                <option value="{{ $major_category->id }}">{{ $major_category->name }}</option>
                            @endforeach
                        </select>
                        @error('major_category_id')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="c" class="form-label">親カテゴリ名</label>
                        <input type="text" name="major_category_name" id="c" class="form-control">
                    </div> --}}
                    <button type="submit" class="btn btn-success mb-3">新規作成</button>
                </form>

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">カテゴリ</th>
                            <td scope="col"></td>
                            <td scope="col"></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <th>{{ $category->id }}</th>
                                <td>{{ $category->name }}</td>
                                <td><a href="{{ route('dashboard.categories.edit', $category) }}"
                                        class="link-success">編集</a></td>
                                <td>
                                    <a href="{{ route('dashboard.categories.destroy', $category) }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form{{ $category->id }}').submit();"
                                        class="link-gray">削除</a>
                                    <form id="logout-form{{ $category->id }}"
                                        action="{{ route('dashboard.categories.destroy', $category) }}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">{{ $categories->links() }}</div>
            </div>
        </div>
    </div>
@endsection
