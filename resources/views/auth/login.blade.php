@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" max-width: 400px;>
            <div class="card">
                <div class="card-header">{{ __('商品管理システム') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('次回から自動でログイン') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ログイン') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('パスワードをお忘れの方？') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- アカウント作成リンクを追加 -->
            <div class="mt-3 text-center">
                <p>
                    {{ __("アカウント作成は") }} 
                    <a href="{{ route('register') }}">{{ __('こちら') }}</a>
                </p>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <style>
    .card {
        width: 100px;  /* カード全体の幅を設定 */
        margin: 0 auto; /* カードを中央に配置 */
    }

    .card-body {
        width: 100px;  /* カード全体の幅を設定 */

        padding: 20px; /* コンテンツの余白 */
    }
    </style>

@stop

@section('js')
@stop

