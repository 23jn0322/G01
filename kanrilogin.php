<?php
    require_once './helpers/KanriDAO.php';

    $AID = '';
    $errs = [];

    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $AID      = $_POST['AID'];
        $APassword = $_POST['APassword'];

        $kanriDAO = new KanriDAO();
        $Admin = $kanriDAO->get_admin($AID, $APassword);
        
        if ($Admin !== false) {
            session_regenerate_id(true);

            $_SESSION['Admin'] = $Admin;

            header('Location: kanri.php');
            exit;
        }
        else {
            $errs[] = '管理者IDまたはパスワードに誤りがあります。';
        }
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ログイン画面 モックアップ</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>

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
        <h2>管理者ログイン</h2>
        <form action="" method="POST">
            <!-- ユーザー名 -->
            <div class="form-group">
                <label for="kanriid">管理者ID</label>
                <input type="text" id="kanriid" name="AID" placeholder="管理者IDを入力" required>
            </div>

            <!-- パスワード -->
            <div class="form-group">
                <label for="password">パスワード</label>
                <input type="password" id="password" name="APassword" placeholder="パスワードを入力" required>
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

       
</body>
</html>
