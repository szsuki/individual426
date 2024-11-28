@extends('adminlte::page')

@section('title', '商品編集')

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
            <!-- 商品編集フォーム -->
            <form method="POST" action="{{ route('item.update', $item->id) }}">
                @csrf
                @method('PUT') <!-- PUTメソッドを使用して更新 -->
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">商品名</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $item->name) }}" placeholder="名前">
                    </div>

                    <div class="form-group">
                        <label for="type">種別</label>
                        <select class="form-control" name="type">
                            <option value="" selected disabled>--選択してください--</option>
                            <option value="1" @if (old('type', $item->type) == 1) selected @endif>文芸</option>
                            <option value="2" @if (old('type', $item->type) == 2) selected @endif>絵本</option>
                            <option value="3" @if (old('type', $item->type) == 3) selected @endif>漫画</option>
                            <option value="4" @if (old('type', $item->type) == 4) selected @endif>雑誌</option>
                            <option value="5" @if (old('type', $item->type) == 5) selected @endif>その他</option>
                        </select>
                        @if ($errors->has('type'))
                            <p class="text-danger">{{ $errors->first('type') }}</p>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="price">価格</label>
                        <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $item->price) }}" placeholder="価格">
                    </div>
                    
                    <div class="form-group">
                        <label for="stock">在庫数</label>
                        <input type="text" class="form-control" id="stock" name="stock" value="{{ old('stock', $item->stock) }}" placeholder="在庫数">
                    </div>
                    
                    <div class="form-group">
                        <label for="detail">詳細</label>
                        <input type="text" class="form-control" id="detail" name="detail" value="{{ old('detail', $item->detail) }}" placeholder="詳細説明">
                    </div>
                    
                <!--    <div class="form-group">
                        <label for="created_by">登録者</label>
                        <input type="text" class="form-control" id="created_by" name="created_by" value="{{ old('created_by', $item->created_by) }}" placeholder="登録者">
                    </div> -->
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-success">更新</button>
                </div>
            </form>

            <!-- 削除フォーム -->
            <form action="{{ route('item.delete', $item->id) }}" method="POST" onsubmit="return confirmDelete();">
                @csrf
                @method('DELETE')
                <div class="card-footer">
                    <button type="submit" class="btn btn-danger">削除</button>
                    <script>
                        function confirmDelete() {
                            return confirm("本当に削除して良いですか？");
                        }
                    </script>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
