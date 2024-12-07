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
            <select name="type" class="form-select" style="width: 10%">
                <option value="">種別</option>
                <option value="1" {{ request('type') == '1' ? 'selected' : '' }}>文芸</option>
                <option value="2" {{ request('type') == '2' ? 'selected' : '' }}>絵本</option>
                <option value="3" {{ request('type') == '3' ? 'selected' : '' }}>漫画</option>
                <option value="4" {{ request('type') == '4' ? 'selected' : '' }}>雑誌</option>
                <option value="5" {{ request('type') == '5' ? 'selected' : '' }}>その他</option>
            </select>
        </div>
        
        <!-- 検索バー -->
        <input type="text" name="keyword" value="{{ $keyword ?? '' }}" placeholder="商品名を入力" class="search-bar">
        <button type="submit" class="btn btn-secondary">検索</button>
    </form>

    <!-- 商品一覧表示 -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">商品一覧</h3>

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
                            @forelse ($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                    @switch($item->type)
                                    @case(1) 文芸 @break
                                    @case(2) 絵本 @break
                                    @case(3) 漫画 @break
                                    @case(4) 雑誌 @break
                                    @default その他
                                    @endswitch
                                    </td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td><a href="{{ route('search.show', $item->id) }}" class="btn_03">詳細</a></td>

                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6">データが見つかりませんでした。</td>
                                </tr>
                            @endforelse

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
        </tbody>
    </table>


    
    <!-- ページネーション -->
    <!--<div class="d-flex justify-content-center mt-4">
        {{ $items->links('pagination::bootstrap-5') }}
    </div> -->


{{-- カスタムCSS --}}
@section('css')
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <style>
    /*ページネーション
     ページネーションのテキスト */
        p.small.text-muted {
            display:none;
        }

        /* 検索フォームの横並び配置 */
        .search-container {
            display: flex;
            align-items: center; /* 垂直方向の位置を中央に揃える */
            gap: 10px; /* 各要素の間隔を調整 */
            margin-top: 20px; /* 上側に20pxの余白を設定 */

        }

        /* テキストボックスの可変幅 */
        .search-bar {
            min-width: 350px; /* 最小幅を設定 */
        }

        /* ドロップダウンの幅調整 */
        .form-select {
        
            width: auto; 
            min-width: 150px; 
        }

        /* ボタンのデザイン調整 */
        .btn-secondary {
            white-space: nowrap; /* ボタンのテキストが折り返されないようにする */
        }

        /**種別のドロップダウン */
        .form-select {
            margin-top: 17px;
            width: auto;         /* 自動調整 */
            min-width: 100px;    /* 最小幅 */
            height: 38px;        /* 他の要素の高さに合わせる */
            line-height: 1.2;    /* テキストの縦方向配置を調整 */
            padding: 6px 12px;   /* 内側の余白 */
        }

        body {
    background-color: #f9f6f1; /* ベージュ */
    font-family: 'Georgia', serif; /* 読書の雰囲気を演出 */
}

h1, h3 {
    color: #5b4636; /* 落ち着いたブラウン */
    text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1); /* やさしい影 */
}

.item-count {
    color: #6b4e3d;
    font-weight: bold;
}

    </style>

@stop

{{-- カスタムJavaScript --}}
@section('js')
    <script>console.log('商品一覧ページ読み込み完了');</script>
@stop
