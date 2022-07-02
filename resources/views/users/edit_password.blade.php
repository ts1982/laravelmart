@extends('layouts.app')

@section('content')
    <div class="container pt-5">
        <form action="{{ route('mypage.update_password') }}" method="post">
            @csrf
            @method('put')
            <div class="form-group row">
                <label for="pass" class="col-md-4 col-form-label text-md-right">新しいパスワード</label>
                <div class="col-md-5">
                    <input type="password" id="pass" name="password"
                        class="form-control @error('password') is-invalid @enderror" required>

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="pass_confirm" class="col-md-4 col-form-label text-md-right">確認用</label>
                <div class="col-md-5">
                    <input type="password" id="pass_confifm" name="password_confirmation" class="form-control" required>
                </div>
            </div>
            <div class="form-group d-flex justify-content-center">
                <button type="submit" class="btn btn-danger w-25">パスワード更新</button>
            </div>
        </form>
    </div>
@endsection
