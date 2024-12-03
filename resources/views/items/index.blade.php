@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品登録・編集</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>
                    <div class="card-tools">
                        <span class="mr-3">登録件数: {{ $totalItems }} 件</span>
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
                                <th>更新日時</th> <!-- 更新日時の列を追加 -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{!! nl2br(e($item->name)) !!}</td>
                                    <td>
                                    @switch($item->type)
                                    @case(1) 文芸 @break
                                    @case(2) 絵本 @break
                                    @case(3) 漫画 @break
                                    @case(4) 雑誌 @break
                                    @case(5) その他 @break
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
    span.mr-3 {
        margin-right: 80px;  /* 商品登録ボタンとの間隔を設定 */

        position: relative;
        right: 150px;  /* 右から40px離れた位置に配置 */
    }
</style>
@stop

@section('js')
@stop
