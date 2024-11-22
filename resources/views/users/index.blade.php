<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>ユーザー一覧</title>

<!-- BootstrapのCSS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="mb-4 text-center">ユーザー一覧</h1>
        
<!-- 成功メッセージの表示 -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ (session('success')) }}
                </div>
            @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">ユーザー名</th>
                                <th scope="col">メールアドレス</th>
                                <th scope="col">登録日時</th>
                                <th scope="col">役割</th>
                                <th scope="col">操作</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    <td>{{ $user->role == 1 ? '管理者' : '利用者' }}</td>
                                    <td>
                                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-sm btn-primary me-2">編集</a>
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete(this)">削除</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!--Bootstrapとの連携-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bunble.min.js"></script>

<!-- 削除確認ダイアログのスクリプト -->
    <script>
        function confirmDelete(button)
    {
        if(confirm("本当に削除しますか？"))
        {
            button.closest("form").submit();
        } else {
            // 削除がキャンセルされた場合の処理
            console.log("削除がキャンセルされました");
        }
    }
    </script>
</body>
</html>