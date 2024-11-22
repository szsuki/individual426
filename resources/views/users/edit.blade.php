<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ユーザー編集</title>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
        <h1 class="mb-4 text-center">ユーザー編集</h1>

<!-- バリデーションエラーメッセージの表示 -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

<!-- ユーザー編集 -->
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                    <div class="mb-3">
                        <label for="id" class="form-label">ID</label>
                        <input type="text" class="form-control" id="id" value="{{ $user->id }}" disabled>
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">ユーザー名</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="email" class="form-label">メールアドレス</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
    
                    <div class="mb-3">
                        <label for="role" class="form-label">役割</label>
                            <select class="form-select @error('role') is-invalid @enderror" id="role" name="role">
                                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>利用者</option>
                                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>管理者</option>
                            </select>
                        @error('role')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

<!-- 更新ボタンと一覧に戻るボタン -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">更新</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary">ユーザー一覧に戻る</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>