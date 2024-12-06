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
            <button type="submit" class="btn btn-outline-info">
            <i class="fas fa-edit"></i> 編集</button>
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
    border-bottom: 1px solid #dee2e6 !important; /* ボーダー */
    }

    .btn-outline-info, .btn-outline-secondary {
        margin-top: 20px; 
    }

    body {
    background-image: url('path_to_your_book_texture_image.jpg');
    background-size: cover;
    background-attachment: fixed;
    background-color: #f5f5dc; /* 画像がない場合のバックアップ */
    }

    h3 {
    font-family: 'Times New Roman', serif;
    color: #4a2c2a; /* 古書風 */
    border-bottom: 3px solid #c4a484;
    padding-bottom: 10px;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    }

    .table {
    border-collapse: collapse;
    background: rgba(255, 248, 220, 0.8); /* 背景 */
    border: 1px solid #c4a484; /* 茶色い */
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    .table th, .table td {
    padding: 10px;
    font-family: 'Georgia', serif;
    color: #4a2c2a; /* 深い茶色 */
    }

    .btn-outline-info, .btn-outline-secondary {
    background-color: #f8f0e3; /* ページ風 */
    border: 2px solid #c4a484;
    color: #4a2c2a;
    font-family: 'Georgia', serif;
    transition: 0.3s;
    }

    .btn-outline-info:hover, .btn-outline-secondary:hover {
    background-color: #c4a484; /* 茶色 */
    color: white;
    }


</style>
@stop

@section('js')
@stop