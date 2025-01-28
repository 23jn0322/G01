<?php
    require_once './helpers/MemberDAO.php';

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!empty($_SESSION['Member'])) {
        $Member = $_SESSION['Member'];
    }
    else {
        header('Location: login.php');
        exit;
    }
?>
<header>
    <link rel="stylesheet" href="bootstrap-5.0.0-dist/css/bootstrap.min.css">
    <link href="css/header.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap" rel="stylesheet">
    <div id="logo">
        <img src="ロゴ２.png" width="250px">
    </div>
    <?php if (isset($Member)) : ?>
            <p style="font-size: 20px"><?= $Member->Name ?>さん</p>
        <?php endif; ?>
    <div id="logout">
        <a href="logout.php" style="font-size: 20px">ログアウト</a>
    </div>
    <table class="link table">
        <tr>
            <th><a href="home.php" style="font-size: 25px">健康メーター</a></th>
            <th><a href="shokutou.php" style="font-size: 25px">食材登録</a></th>
            <th><a href="kaiinhenkou.php" style="font-size: 25px">会員情報変更</a></th>
        </tr>
    </table>
</header>