@extends('adminlte::page')

@section('title', 'ユーザー情報編集画面')

@section('content')
<div class="wrapper">
    <div class="mt-4 mb-4 pt-4">
        <h3 class="text-center pt-4 mt-4">マイページ編集画面</h3>
    </div>

    @if(session('alertMessage'))
        <div class="alert alert-danger" role="alert">
            {{ session('alertMessage') }}
        </div>
    @endif

    <div class="row">
        <form class="col-4 mx-auto p-3" method="POST" action="{{ route('profileUpdate', $auth->id) }}">
            @csrf
            @method('patch')

            <div id="passwordHelpBlock" class="form-text text-primary">
                ※変更したい項目を入力してください。
            </div>

            <!-- 名前 -->
            <div class="m-auto">
                <div class="mb-1">
                    <label for="name" class="col-form-label">名前</label>
                    <input class="form-control" 
                           type="text" 
                           id="name" 
                           name="name" 
                           value="{{ $auth->name }}">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- メールアドレス -->
            <div class="m-auto">
                <div class="mb-1">
                    <label for="email" class="col-form-label">メールアドレス</label>
                    <input class="form-control" 
                           type="text" 
                           id="email" 
                           name="email" 
                           value="{{ $auth->email }}">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- パスワード -->
             <h5>パスワード変更</h5>
            <div id="passwordHelpBlock" class="form-text text-primary">
                    ※パスワードを変更する場合は、現在のパスワードと新しいパスワードを入力してください。
                </div>
            <div class="mb-1">
                <label for="current_password" class="col-form-label">現在のパスワード</label>
                <div class="position-relative">
                    <input class="form-control" 
                           type="password" 
                           id="password" 
                           name="current_password" 
                           placeholder="******">
                </div>

            </div>

            <div class="mb-1">
                <label for="password" class="col-form-label">新しいパスワード</label>
                <div class="position-relative">
                    <input class="form-control" 
                           type="password" 
                           id="password2" 
                           name="password" 
                           placeholder="******">
                </div>
                @error('password')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-1">
                <label for="password_confirmation" class="col-form-label">新しいパスワード(確認)</label>
                <div class="position-relative">
                    <input class="form-control" 
                           type="password" 
                           id="password3" 
                           name="password_confirmation" 
                           placeholder="******">
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="mt-4 btn btn-primary">更新</button>
            </div>
            <div class="d-flex justify-content-center mt-2">
                <a href="{{ route('profile', $auth->id) }}">
                    <button class="btn btn-secondary" type="button">戻る</button>
                </a>
            </div>
        </form>
    </div>
</div>
@stop

@section('css')

 <style>
    text-center pt-4 mt-4{
        position: relative; /* 他の要素への影響を受けないようにするためにrelativeを使用 */
        top: -10px; /* テキストを上に10px移動 */
    }



 </style>

@stop

@section('js')
<script>

</script>
@stop