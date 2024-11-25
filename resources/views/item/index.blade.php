@extends('adminlte::page')

@section('title', '商品一覧')

@section('content_header')
    <h1>商品一覧</h1>
@stop

@section('content')
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
                                <th>名前</th>
                                <th>種別</th>
                                <th>登録日時</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                            <h1 style="text-align: center;">商品詳細情報</h1>
    <table>
        <tr>
            <th>ID</th>
            <td>{{ $item->id }}</td>
        </tr>
        <tr>
            <th>種別</th>
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
            <th>商品名</th>
            <td>{!! nl2br(e($item->name)) !!}</td>
        </tr>
        <tr>
            <th>登録日時</th>
            <td>{{ $item->created_at }}</td>
        </tr>
        <tr>
            <th>更新日時</th>
            <td>{{ $item->updated_at }}</td>
        </tr>
        <tr>
            <th>価格</th>
            <td>{{ $item->price }} 円</td>
        </tr>
        <tr>
            <th>詳細</th>
            <td>{!! nl2br(e($item->detail)) !!}</td>
        </tr>
    </table>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
