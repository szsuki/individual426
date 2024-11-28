@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>本の登録・検索</h1>
@stop

@section('content')
    <p>ようこそ、図書館へ</p>

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5>新着情報</h5>
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

    <div class="row mt-4">
        <div class="col-12">
            <!-- Carousel Section -->
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/images/reading-2605540_640.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Vegetable</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/1.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Seafood</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="/images/2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Fruits</h5>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

        </div>
    </div>
@stop

@section('css')
    {{-- 必要に応じてカスタムCSSを指定 --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
