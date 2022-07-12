@extends('layouts.mypage')

@section('content')
    <div class="row pt-5">
        <div class="col-md-8 offset-md-2">
            <h2 class="text-center mb-5">パスワード変更</h2>
            <form action="{{ route('mypage.update_password') }}" method="post">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label for="pass" class="col-md-4 col-form-label text-md-right">新しいパスワード</label>
                    <div class="col-md-8">
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
                    <label for="pass_confirm" class="col-md-4 col-form-label text-md-right">確認</label>
                    <div class="col-md-8">
                        <input type="password" id="pass_confifm" name="password_confirmation" class="form-control" required>
                    </div>
                </div>
                <div class="form-group text-right">
                    <button type="submit" class="btn btn-danger">パスワード更新</button>
                </div>
            </form>
        </div>
    </div>
@endsection
