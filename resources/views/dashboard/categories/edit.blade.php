@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="container">
                <form action="{{ route('dashboard.categories.update', $category) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="a" class="form-label">カテゴリ名</label>
                        <input type="text" name="name" value="{{ $category->name }}" id="a"
                            class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="b" class="form-label">カテゴリの説明</label>
                        <input type="text" name="description" value="{{ $category->description }}" id="b"
                            class="form-control">
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="c" class="form-label">親カテゴリ名</label>
                        <select name="major_category_id" class="form-control" id="c">
                            @foreach ($major_categories as $major_category)
                                @if ($major_category->id == $category->major_category_id)
                                    <option value="{{ $major_category->id }}" selected>{{ $major_category->name }}
                                    </option>
                                @else
                                    <option value="{{ $major_category->id }}">{{ $major_category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success mb-3">更新</button>
                </form>
                <a href="/dashboard/categories">カテゴリ一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
