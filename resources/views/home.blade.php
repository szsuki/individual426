
{{-- AdminLTEの基本構成 自動的に適用 共通レイアウト(ナビゲーションバー、サイドバー、フッターなど) --}}
@extends('adminlte::page')

{{-- ページタイトル設定 ブラウザのタブや画面ヘッダー部分に表示 --}}
@section('title', 'Dashboard')

{{-- コンテンツヘッダー ページのメイン見出し(ヘッダー部分) --}}

@section('content_header')
    <h1>Dashboard</h1>


@stop

{{-- メインコンテンツ グラフ、テーブル、統計情報、リンクなど、ダッシュボードに必要な要素 --}}

@section('content')
    <p>Welcome to this beautiful admin panel.</p>


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Recent Activity</h5>
                </div>
                <div class="card-body">
                    <!-- アクティビティリスト -->
                    <ul>
                        <li>ログインしました</li>
                        <li>新しい投稿を作成しました</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>Your Stats</h5>
                </div>
                <div class="card-body">
                    <!-- ユーザーステータス -->
                    <p>総投稿数: 20</p>
                    <p>フォロワー数: 100</p>
                </div>
            </div>
        </div>
    </div>



@stop


{{-- カスタムCSS /css/admin_custom.css というカスタムスタイルを適用することが可能 --}}

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}


@stop

{{-- カスタムJavaScript  --}}

@section('js')
    <script> console.log('Hi!'); </script>
@stop
