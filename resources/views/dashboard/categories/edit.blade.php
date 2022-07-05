@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="container">
                <form action="{{ route('categories.update', $category) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="a" class="form-label">カテゴリ名</label>
                        <input type="text" name="name" value="{{ $category->name }}" id="a"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="b" class="form-label">カテゴリの説明</label>
                        <input type="text" name="description" value="{{ $category->description }}" id="b"
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="c" class="form-label">親カテゴリ名</label>
                        <input type="text" name="major_category_name" value="{{ $category->major_category_name }}"
                            id="c" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success mb-3">更新</button>
                </form>
                <a href="/dashboard/categories">カテゴリ一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
