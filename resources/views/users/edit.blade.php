@extends('layouts.mypage')

@section('content')
    <div class="container p-0">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1 p-0">
                <a href="/mypage">マイページ</a>&nbsp;>&nbsp;会員情報の編集
                <div class="card mt-3">
                    <div class="card-header"><span class="d-inline-block text-center w-100">{{ __('会員情報の編集') }}</span></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('mypage.update') }}">
                            @csrf
                            @method('put')

                            <div class="form-group row">
                                <label for="name"
                                    class="col-md-4 col-form-label text-md-right">{{ __('氏名') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ $user->name ?? old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('メールアドレス') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email ?? old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postal"
                                    class="col-md-4 col-form-label text-md-right">{{ __('郵便番号') }}</label>

                                <div class="col-md-6">
                                    <input id="postal" type="text"
                                        class="form-control @error('postal') is-invalid @enderror" name="postal"
                                        value="{{ $user->postal ?? old('postal') }}" required autocomplete="postal">

                                    @error('postal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postal"
                                    class="col-md-4 col-form-label text-md-right">{{ __('住所') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                        class="form-control @error('address') is-invalid @enderror" name="address"
                                        value="{{ $user->address ?? old('address') }}" required autocomplete="address">

                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postal"
                                    class="col-md-4 col-form-label text-md-right">{{ __('電話番号') }}</label>

                                <div class="col-md-6">
                                    <input id="tel" type="text"
                                        class="form-control @error('tel') is-invalid @enderror" name="tel"
                                        value="{{ $user->tel ?? old('tel') }}" required autocomplete="tel">

                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="mx-auto w-25">
                                    <button type="submit" class="btn btn-success w-100">
                                        {{ __('更新') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <!-- Button trigger modal -->
                    <div class="text-right">
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#exampleModal">
                            退会
                        </button>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">退会申請</h5>
                                </div>
                                <div class="modal-body">
                                    本当に退会してよろしいですか？
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">キャンセル</button>
                                    <form action="{{ route('mypage.destroy') }}" method="post" class="text-right">
                                        @csrf
                                        <button type="sumbit" class="btn btn-danger">退会する</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
