<?php
    require_once './helpers/MemberDAO.php';

    $MID = '';
    $errs = [];

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $MID      = $_POST['MID'];
        $Password = $_POST['Password'];

        $MemberDAO = new MemberDAO();
        $Member = $MemberDAO->get_member($MID, $Password);
        
        if ($Member !== false) {
            session_regenerate_id(true);

            $_SESSION['Member'] = $Member;

            header('Location: home.php');
            exit;
        }
        else {
            $errs[] = 'ユーザー名またはパスワードに誤りがあります。';
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面 モックアップ</title>
    <link rel="stylesheet" href="css/login.css"> <!-- CSSファイルを読み込み -->
</head>
<body>

    <!-- ログインフォームのモックアップ -->
    <div class="login-container">
        <h2>ログイン</h2>
        <form action="" method="POST">
            <!-- ユーザー名 -->
            <div class="form-group">
                <label for="username">ユーザー名</label>
                <input type="text" id="username" name="MID" placeholder="ユーザー名を入力" required>
            </div>

            <!-- パスワード -->
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="Password" placeholder="パスワードを入力" required>
            </div>

            <!-- ログインボタン -->
            <div class="form-group right-align">
                <input type="submit" value="ログイン">
            </div>
            <?php foreach($errs as $e) : ?>
                <span style="color:red"><?= $e ?></span>
                <br>
            <?php endforeach ?>
        </form>

        <!-- 新規登録のテキスト -->
        <div class="register-text">
            新規登録はこちら↓
        </div>

        <!-- 新規登録ボタン -->
        <div class="right-align">
            <a href="kaiintoroku.php"><button class="register-btn">新規登録</button></a>
        </div>
    </div>

</body>
</html>
