@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品登録・編集</h1>
@stop

@section('content')
    <!-- 件数の表示 -->
    <p class="item-count">登録件数: {{ $totalItems }} 件</p>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <div class="input-group-append">
                                <a href="{{ url('items/add') }}" class="btn btn-default">商品登録</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>商品名</th>
                                <th>種別</th>
                                <th>登録日時</th>
                                <th>更新日時</th> <!-- 更新日時の列 -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{!! nl2br(e($item->name)) !!}</td>
                                    <td>
                                    @switch($item->type)
                                    @case(1) <i class="fas fa-book"></i> 文芸 @break
                                    @case(2) <i class="fas fa-palette"></i> 絵本 @break
                                    @case(3) <i class="fas fa-comic"></i> 漫画 @break
                                    @case(4) <i class="fas fa-newspaper"></i> 雑誌 @break
                                    @case(5) <i class="fas fa-ellipsis-h"></i> その他 @break
                                    @endswitch
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td class="align-middle text-center"><a href="/items/edit/{{$item->id}}" class="btn btn-outline-success btn-sm">編集</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            <!-- ページネーション -->
            @if ($items->hasPages())
            <div class="pagination mt-4 d-flex justify-content-center">
            {{ $items->links('pagination::bootstrap-5') }}
            </div>
            @endif
            </div>
        </div>
    </div>
@stop
    <!-- ページネーション -->
    <!--<div class="pagination mt-4 d-flex justify-content-center">
        {{ $items->links('pagination::bootstrap-5') }}
    </div> -->
@section('css')
<style>

/* ページ全体の背景とカードスタイル */
body {
    background-color: #f5f5dc; /* ベージュっぽい背景 */
    font-family: 'Georgia', serif; /* 読書をイメージしたフォント */
}

/* ヘッダー部分 */
.content-header h1 {
    color: #6b4e3d; /* 暖かみのあるブラウン */
    text-shadow: 1px 1px 2px #d4b89a; /* 柔らかい影 */
}

/* テーブルスタイル */
.table-hover thead th {
    background-color: #e0d3c1; /* 本のページのような色 */
    color: #4b3828; /* クラシックなダークブラウン */
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 14px;
}

.table-hover tbody tr {
    transition: background-color 0.2s ease;
}

.table-hover tbody tr:hover {
    background-color: #f4f1e1; /* ホバー時に本の紙っぽい色 */
}

/* 各列のスタイル */
.table-hover td {
    color: #5a4636;
}

/* ボタンスタイル */
.btn-outline-success {
    border-color: #8c6d62;
    color: #6b4e3d;
    font-weight: bold;
}

.btn-outline-success:hover {
    background-color: #8c6d62;
    color: #fff;
}



/* 種別ごとのスタイル */
.table-hover .type-1 { /* 文芸 */
    background-color: #e6dcc3;
    color: #5b4631;
}

.table-hover .type-2 { /* 絵本 */
    background-color: #f9f2dc;
    color: #885a2a;
}

.table-hover .type-3 { /* 漫画 */
    background-color: #e0e8f0;
    color: #2a4c74;
}

.table-hover .type-4 { /* 雑誌 */
    background-color: #ffe4e1;
    color: #842929;
}

.table-hover .type-5 { /* その他 */
    background-color: #f3f3f3;
    color: #555;
}


</style>
@stop

@section('js')
@stop
