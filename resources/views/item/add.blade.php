@extends('adminlte::page')

@section('title', '商品登録')

@section('content_header')
    <h1>商品登録</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-10">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                       @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                       @endforeach
                    </ul>
                </div>
            @endif

            <div class="card card-primary">
                <form method="POST" action="{{ route('items.store') }}">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">名前</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                        <label for="type">種別</label>
                        <select class="form-control" id="type" name="type">
                            <option value="">-- 種別を選択してください --</option>
                            <option value="literature" {{ old('type') == 'literature' ? 'selected' : '' }}>文芸</option>
                            <option value="children" {{ old('type') == 'children' ? 'selected' : '' }}>絵本</option>
                            <option value="comic" {{ old('type') == 'comic' ? 'selected' : '' }}>漫画</option>
                            <option value="magazine" {{ old('type') == 'magazine' ? 'selected' : '' }}>雑誌</option>
                            <option value="other" {{ old('type') == 'other' ? 'selected' : '' }}>その他</option>
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="text" class="form-control" id="price" name="price" placeholder="価格">
                        </div>
                        
                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数">
                        </div>
                        <div class="form-group">
                            <label for="code">商品コード</label>
                            <input type="text" name="code" id="code" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <input type="text" class="form-control" id="detail" name="detail" placeholder="詳細説明">
                        </div>
                        
                        <div class="form-group">
                            <label for="crated_by">登録者</label>
                            <input type="text" class="form-control" id="crated_by" name="crated_by" placeholder="登録者">
                        </div>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('css')
@stop

@section('js')
@stop
