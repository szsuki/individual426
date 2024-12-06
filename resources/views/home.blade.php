    @extends('adminlte::page')

    @section('title', '本の管理')

    @section('content_header')
        <h1>本の登録・検索</h1>
    @stop

    @section('content')
        <p>ようこそ、図書館へ</p>

        <div class="row">
        <div class="card mt-4">
        <div class="card-header">
            <h5>新着商品</h5>
        </div>
        <div class="card-body">
            <ul class="list-group">
                @forelse ($items as $item)
                    <li class="list-group-item">
                        <strong>{{ $item->name }}</strong> - {{ $types[$item->type] ?? '種別不明' }}
                    </li>
                @empty
                    <li class="list-group-item">新着商品はありません。</li>
                @endforelse
            </ul>
        </div>
        </div>

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>お知らせ</h5>
                    </div>
                    <div class="card-body">
                        <!-- ユーザーステータス -->
                        <p>新着商品更新中</p>
                        <p>フォロワー数: 100人突破</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4 text-center">
            <div class="col-12 mx-auto">
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
                    <h5>magazine</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>library</h5>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>book</h5>
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
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <style>
            /* 新着商品カード全体のサイズ */
            .card.mt-4 {
                max-width: 600px; /* 最大幅 */
                flex: 1; /* 同じ高さになるように */

            }

            /* リストの間隔を調整 */
            .list-group-item {
                padding: 10px 15px; /* 余白 */
                font-size: 14px; /* 文字サイズ */
            }

            .col-lg-6{
            max-width: 600px;
            }

            /**スライド画像 */
            .col-12{
            margin-top: 20px; /* 上部に余白 */
            max-width: 950px;
            margin-top: 20px; /* 上部に余白 */
            }



        </style>
    @stop

    @section('js')
        <!-- Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    @stop
