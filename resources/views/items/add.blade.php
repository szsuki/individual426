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
                            <label for="name">商品名</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="名前">
                        </div>

                        <div class="form-group">
                        <label for="type">種別</label>
                    <select class="form-control" name="type">
                    <option value="" selected disabled>--選択してください--</option>
                    <option value="1" @if ( old('type') == 1 ) selected @endif>文芸</option>
                    <option value="2" @if ( old('type') == 2 ) selected @endif>絵本</option>
                    <option value="3" @if ( old('type') == 3 ) selected @endif>漫画</option>
                    <option value="4" @if ( old('type') == 4 ) selected @endif>雑誌</option>
                    <option value="5" @if ( old('type') == 5 ) selected @endif>その他</option>
                    </select>
                    @if($errors->has('type'))
                        <p class="text-danger">{{ $errors->first('type') }}</p>
                    @endif
                        </div>

                        <div class="form-group">
                            <label for="price">価格</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="価格" min="0" max="9999999" step="1">
                        </div>
                        
                        <div class="form-group">
                            <label for="stock">在庫数</label>
                            <input type="text" class="form-control" id="stock" name="stock" placeholder="在庫数">
                        </div>
                        
                        <div class="form-group">
                            <label for="detail">詳細</label>
                            <textarea class="form-control" id="detail" name="detail" placeholder="詳細説明" rows="5"></textarea>
                        </div>
                        
                        <!--<div class="form-group">
                            <label for="created_by">登録者</label>
                            <input type="text" class="form-control" id="created_by" name="created_by" placeholder="登録者">
                        </div> -->
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">登録</button>
                        <a href="{{ route('items.index') }}" class="btn btn-secondary">商品一覧に戻る</a>
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

                       