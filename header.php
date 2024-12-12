<?php
    require_once './helpers/MemberDAO.php';

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!empty($_SESSION['Member'])) {
        $Member = $_SESSION['Member'];
    }
?>
<header>
    <link href="css/header.css" rel="stylesheet">
    <div id="logo">
        <img src="パン.png" width="200px" height="100px">
    </div>
    <?php if (isset($Member)) : ?>
            <?= $Member->Name ?>さん
        <?php endif; ?>
    <div id="logout">
        <a href="login.php">ログアウト</a>
    </div>
    <table class="link table">
        <tr>
            <th><a href="home.php">健康メーター</a></th>
            <th><a href="shokutou.php">食材登録</a></th>
            <th><a href="kaiinhenkou.php">会員情報変更</a></th>
        </tr>
    </table>
</header>