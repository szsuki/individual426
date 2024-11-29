@extends('adminlte::page')

@section('title', 'マイページ')

@section('content')
<div class="p-4 m-4 w-50 m-auto">
    <h3 class="pt-4 m-4 text-center">マイページ</h3>
    
    @if(session('alertMessage'))
        <div class="alert alert-danger" role="alert">
            {{ session('alertMessage') }}
        </div>
    @elseif(session('successMessage'))
        <div class="alert alert-success" role="alert">
            {{ session('successMessage') }}
        </div>
    @endif

    <div class="table-responsive" style="height:500px">
        <table class="table align-middle">
            <tbody>
                <thead>
                    <tr>
                        <th class="text-secondary" style="width:30%">ユーザーID</th>
                        <td style="width:50%">
                            <p class="m-0">{{ $auth->id }}</p>
                        </td>
                    </tr>
                </thead>
                <thead>
                    <tr class="align-middle">
                        <th class="text-secondary" style="width:30%">名前</th>
                        <td class="" style="width:50%">
                            <p class="m-0">{{ $auth->name }}</p>
                        </td>
                    </tr>
                </thead>
                <thead>
                    <tr class="align-middle">
                        <th class="text-secondary" style="width:30%">メールアドレス</th>
                        <td class="" style="width:50%">
                            <p class="m-0">{{ $auth->email }}</p>
                        </td>
                    </tr>
                </thead>
                <thead>
                    <tr scope="row" class="align-middle">
                        <th class="text-secondary">パスワード</th>
                        <td>
                            <p class="m-0">******</p>
                        </td>
                    </tr>
                </thead>
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            <a class="link-primary" href="{{ route('profileEdit', auth()->user()) }}">
                <button type="submit" class="btn btn-outline-info">編集</button>
            </a>
        </div>
        <div class="d-flex justify-content-center mt-2">
            <a class="link-primary" href="{{ ('/home') }}">
                <button type="submit" class="btn btn-outline-secondary">HOME</button>
            </a>
        </div>
    </div>
</div>
@stop

@section('css')
<style>
    .table td, .table th {
    border-bottom: 1px solid #dee2e6 !important; /* ボーダーを明示的に追加 */
}

    .btn-outline-info, .btn-outline-secondary {
        margin-top: 20px; 
    }
</style>
@stop

@section('js')
@stop