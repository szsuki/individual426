{{-- AdminLTEの基本構成 --}}
@extends('adminlte::page')

{{-- ページタイトル --}}
@section('title', '商品一覧・検索')

{{-- コンテンツヘッダー --}}
@section('content_header')
    <h1>商品一覧・検索</h1>
@stop

{{-- メインコンテンツ --}}
@section('content')
    <!-- 件数の表示 -->
    <p class="item-count">検索結果：{{ $itemCount }}件</p>

    <!-- 検索フォーム -->
    <form method="GET" action="{{ route('search.list') }}" class="search-container">
        <div class="form-group">
            <select name="type" class="form-select" style="width: 100%">
                <option value="">種別</option>
                <option value="1" {{ request('type') == '1' ? 'selected' : '' }}>1.果物</option>
                <option value="2" {{ request('type') == '2' ? 'selected' : '' }}>2.野菜</option>
                <option value="3" {{ request('type') == '3' ? 'selected' : '' }}>3.精肉</option>
                <option value="4" {{ request('type') == '4' ? 'selected' : '' }}>4.鮮魚</option>
                <option value="5" {{ request('type') == '5' ? 'selected' : '' }}>5.その他</option>
            </select>
        </div>
        
        <!-- 検索バー -->
        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="商品名を入力" class="search-bar">
        <button type="submit" class="btn btn-secondary">検索</button>
    </form>

    <!-- 商品一覧表示 -->
    <table class="product-table">
        <thead>
            <tr>
                <th>
                    <a href="{{ route('search.list', ['sort' => 'id', 'order' => $sortField == 'id' && $sortOrder == 'asc' ? 'desc' : 'asc', 'keyword' => request('keyword'), 'type' => request('type')]) }}" 
                       class="{{ $sortField == 'id' ? ($sortOrder == 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">ID</a>
                </th>
                <th>
                    <a href="{{ route('search.list', ['sort' => 'type', 'order' => $sortField == 'type' && $sortOrder == 'asc' ? 'desc' : 'asc', 'keyword' => request('keyword'), 'type' => request('type')]) }}" 
                       class="{{ $sortField == 'type' ? ($sortOrder == 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">種別</a>
                </th>
                <th>
                    <a href="{{ route('search.list', ['sort' => 'name', 'order' => $sortField == 'name' && $sortOrder == 'asc' ? 'desc' : 'asc', 'keyword' => request('keyword'), 'type' => request('type')]) }}" 
                       class="{{ $sortField == 'name' ? ($sortOrder == 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">商品名</a>
                </th>
                <th>
                    <a href="{{ route('search.list', ['sort' => 'created_at', 'order' => $sortField == 'created_at' && $sortOrder == 'asc' ? 'desc' : 'asc', 'keyword' => request('keyword'), 'type' => request('type')]) }}" 
                       class="{{ $sortField == 'created_at' ? ($sortOrder == 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">登録日時</a>
                </th>
                <th>
                    <a href="{{ route('search.list', ['sort' => 'updated_at', 'order' => $sortField == 'updated_at' && $sortOrder == 'asc' ? 'desc' : 'asc', 'keyword' => request('keyword'), 'type' => request('type')]) }}" 
                       class="{{ $sortField == 'updated_at' ? ($sortOrder == 'asc' ? 'sort-asc' : 'sort-desc') : '' }}">更新日時</a>
                </th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($items as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>
                        @switch($item->type)
                            @case(1) 文芸 @break
                            @case(2) 絵本 @break
                            @case(3) 漫画 @break
                            @case(4) 雑誌 @break
                            @default その他
                        @endswitch
                    </td>
                    <td>{!! nl2br(e($item->name)) !!}</td>
                    <td>{{ $item->created_at->format('Y-m-d H:i') }}</td>
                    <td>{{ $item->updated_at->format('Y-m-d H:i') }}</td>
                    <td><a href="{{ route('search.show', $item->id) }}" class="btn_03">詳細</a></td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">データが見つかりませんでした。</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- ページネーション -->
    <div class="pagination mt-4 d-flex justify-content-center">
        {{ $items->links('pagination::bootstrap-5') }}
    </div>
@stop

{{-- カスタムCSS --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
@stop

{{-- カスタムJavaScript --}}
@section('js')
    <script>console.log('商品一覧ページ読み込み完了');</script>
@stop
