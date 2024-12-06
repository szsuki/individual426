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
.table-container {
    display: flex;
    justify-content: center; /* テーブル全体を中央配置 */
    margin: 20px auto; /* 上下にスペースを追加 */
    max-width: 80%; /* 最大幅を設定 */
}

.table {
    width: 100%; /* 親コンテナに対する幅を調整 */
    background: rgba(255, 248, 220, 0.8);
    border: 1px solid #c4a484;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    border-collapse: collapse; /* テーブル枠線の重複を防ぐ */
}

.table th {
    width: 30%; /* 列幅を固定 */
    background-color: #f8f8f8;
    text-align: left;
    padding: 8px;
    font-family: 'Georgia', serif;
    color: #4a2c2a;
}

.table td {
    width: 70%; /* 残りのスペースを埋める */
    padding: 8px;
    font-family: 'Georgia', serif;
    color: #4a2c2a;
}

.table th, .table td {
    border-bottom: 1px solid #dee2e6 !important;
}

</style>
@stop
