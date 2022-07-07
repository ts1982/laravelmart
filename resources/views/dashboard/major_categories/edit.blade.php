@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-9">
            <div class="container">
                <form action="{{ route('dashboard.major_categories.update', $major_category) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label class="form-label">親カテゴリ名</label>
                        <input type="text" name="name" value="{{ $major_category->name }}" class="form-control">
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">親カテゴリの説明</label>
                        <textarea name="description" class="form-control">{{ $major_category->description }}</textarea>
                        @error('description')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success mb-3">更新</button>
                </form>
                <a href="/dashboard/major_categories">親カテゴリ一覧に戻る</a>
            </div>
        </div>
    </div>
@endsection
