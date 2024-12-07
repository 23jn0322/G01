<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ログイン画面 モックアップ</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

    <!-- ログインフォームのモックアップ -->
    <div class="login-container">
        <h2>管理者ログイン</h2>
        <form action="kanri.php" method="POST">
            <!-- ユーザー名 -->
            <div class="form-group">
                <label for="username">管理者ID</label>
                <input type="text" id="username" name="username" placeholder="ユーザー名を入力" required>
            </div>

            <!-- パスワード -->
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="password" placeholder="パスワードを入力" required>
            </div>

            <!-- ログインボタン -->
            <div class="form-group right-align">
                <input type="submit" value="ログイン">
            </div>
        </form>
    </div>

</body>
</html>
