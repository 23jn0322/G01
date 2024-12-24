<?php
require_once './helpers/SyokutouDAO.php';
require_once './helpers/MemberDAO.php';
require_once './helpers/RirekiDAO.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!empty($_SESSION['Member'])) {
    $Member = $_SESSION['Member'];
}

$RirekiDAO = new RirekiDAO();
$rireki_list = $RirekiDAO->get_rireki_by_MID($Member->MID);
$unit_list = $RirekiDAO->get_rireki_by_UID();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>買い物登録画面</title>
    <link rel="stylesheet" href="css/rirekitoroku.css">
</head>

<body>
    <div class="title">履歴から買い物登録</div>
    <div class="container">
        <div class="content">
            <?php foreach ($rireki_list as $rireki) : ?>
                <div class="item-row">
                    <input type="text" class="item-input" value="<?= $rireki->SyokuName ?>">
                    <div class="row">
                        <input type="number" value="0" class="quantity-input">
                        <select>
                            <?php foreach ($unit_list as $unit) : ?>
                                <?php if ($rireki->SyokuID === $unit->SyokuID): ?>
                                    <option value=<?= $unit->UnitName ?>><?= $unit->UnitName ?></option>
                                <?php endif ?>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <!-- フッター部分 -->
    <div class="footer">
        <a href="shokutou.php" class="small-button">戻る</a>
        <a href="home.php" class="small-button">冷蔵庫in</a>

    </div>
</body>

</html>