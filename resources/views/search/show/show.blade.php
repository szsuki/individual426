@extends('adminlte::page')

@section('title', '商品詳細情報')

@section('content')
<div class="p-4 m-4 w-50 m-auto">
    <h3 class="pt-4 m-4 text-center">商品詳細情報</h3>
    <table class="table align-middle">
        <tbody>
            <tr>
                <th class="text-secondary" style="width:30%">ID</th>
                <td style="width:50%">{{ $item->id }}</td>
            </tr>
            <tr>
                <th class="text-secondary">種別</th>
                <td>
                    @switch($item->type)
                        @case(1) 文芸 @break
                        @case(2) 絵本 @break
                        @case(3) 漫画 @break
                        @case(4) 雑誌 @break
                        @default その他
                    @endswitch
                </td>
            </tr>
            <tr>
                <th class="text-secondary">商品名</th>
                <td>{!! nl2br(e($item->name)) !!}</td>
            </tr>
            <tr>
                <th class="text-secondary">価格</th>
                <td>{{ number_format($item->price, 0) }} 円</td>
            </tr>
            <tr>
                <th class="text-secondary">在庫数</th>
                <td>{{ $item->stock }} 冊</td>
            </tr>
            <tr>
                <th class="text-secondary">詳細</th>
                <td>{!! nl2br(e($item->detail)) !!}</td>
            </tr>
            <tr>
                <th class="text-secondary">登録日時</th>
                <td>{{ $item->created_at }}</td>
            </tr>
            <tr>
                <th class="text-secondary">更新日時</th>
                <td>{{ $item->updated_at }}</td>
            </tr>
        </tbody>
    </table>

    <div class="d-flex justify-content-center mt-2">
        <a href="{{ route('search.list') }}" class="link-primary">
            <button type="button" class="btn btn-outline-secondary">一覧に戻る</button>
        </a>
    </div>
</div>
@stop

@section('css')
<style>
    .table-wrapper {
    display: flex;               /* フレックスボックスを利用 */
    justify-content: center;     /* 水平方向中央揃え */
    align-items: center;         /* 垂直方向中央揃え */
    margin: 20px auto;           /* 上下にスペースを追加 */
    padding: 20px;               /* 見栄えを調整 */
    max-width: 100%;             /* 最大幅を制限 */
    }

    /**タイトル */
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
        width: 800px;
        background: rgba(255, 248, 220, 0.8);
        border: 1px solid #c4a484;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    }

    /**項目の列 */
    .table th {
        width: 30%; /* 列幅を固定 */
        background-color: #f8f8f8;
        text-align: left;
        padding: 8px;
        font-family: 'Georgia', serif;
        color: #4a2c2a;
    }

    /**内容の列 */
    .table td {
        width: 70%; 
        padding: 8px;
        font-family: 'Georgia', serif;
        color: #4a2c2a;
    }

    .btn-outline-info, .btn-outline-secondary {
        background-color: #f8f0e3;
        border: 2px solid #c4a484;
        color: #4a2c2a;
        font-family: 'Georgia', serif;
        transition: 0.3s;
    }

    .btn-outline-info:hover, .btn-outline-secondary:hover {
        background-color: #c4a484;
        color: white;
    }

    .p-4.m-4.w-50.m-auto {
    width: 70%; /* コンテナの幅を広げます。 */
    }

</style>
@stop
