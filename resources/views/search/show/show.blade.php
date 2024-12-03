<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品詳細</title>
    <style>
        /*テーブル全体*/
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        
        /*テーブルの内容*/
        th, td {
            padding: 10px;
            border: 1px solid #333;
        }

        /*テーブル*/
        th {
            background-color: #f8f8f8;
            text-align: left;
            width: 20%;
        }

        /*商品詳細情報のタイトル*/
        h1 {
            background: #c2edff;
            padding: 0.5em;
        }

        /*戻るボタン*/
        .back-button{
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

    </style>
</head>

<body>
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
            <th>価格</th>
            <td>{{ number_format($item->price, 0) }} 円</td>
        </tr>
        <tr>
            <th>在庫数</th>
            <td>{{ $item->stock }} 冊</td>
        </tr>
        <tr>
            <th>詳細</th>
            <td>{!! nl2br(e($item->detail)) !!}</td>
        </tr>
        <!--<tr>
            <th>登録者</th>
            <td>{{ $item->created_by  }}</td>

        </tr>-->
        <tr>
            <th>登録日時</th>
            <td>{{ $item->created_at }}</td>
        </tr>
        <tr>
            <th>更新日時</th>
            <td>{{ $item->updated_at }}</td>
        </tr>
    </table>

    <!-- 戻るボタン -->
     <a href="{{ route('search.list') }}" class="back-button">一覧に戻る</a>
</body>
</html>
