<?php include "header.php" ?>
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
$SyokutouDAO = new SyokutouDAO();
$RirekiDAO = new RirekiDAO();
$rireki_list = $RirekiDAO->get_rireki_by_MID($Member->MID);
$i2 = 0;
$TF = false;
if($_SERVER['REQUEST_METHOD']==='POST'){    
    if(isset($_POST['Resist'])){
        $i = $_POST['suji'];
        for($i2 = 0; $i2 < $i; $i2++){
            $Syoku = $SyokutouDAO->get_SyokuID_by_SyokuName($_POST['SyokuName'.$i2]); 
            $Quantity = $_POST['Quantity'.$i2]; //forぶんでまわして数字をふやす
            $UID =$_POST['UID'.$i2];
            if($Quantity > 0){
                $TF = $SyokutouDAO->insert_syokutou($Member->MID,$Syoku->SyokuID,$Quantity,$UID);
            }
        }
        if ($TF == true){
            header('Location: home.php');
            exit;
        }
        else{
            //エラー文を入れる
        }
    }
}

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
<?php $i = 0; ?>
    <div class="title">履歴から買い物登録</div>
    <form action="" method="POST">
        <div class="container">
            <div class="content">
                <?php foreach ($rireki_list as $rireki) : ?>
                    <div class="item-row">
                        <input type="text" name = <?= "SyokuName".$i ?> class="item-input" readonly value="<?= $rireki->SyokuName ?>">
                        <div class="row">
                            <input type="text" value="0" class="quantity-input" name = <?= "Quantity".$i ?>>
                            <input name=<?= "UnitName" . $i ?> class="unittext" readonly value=<?= ($RirekiDAO->get_UID_by_SyokuID($rireki->SyokuID))->UnitName ?>>
                            <input type="hidden" name=<?="UID" . $i ?> value=<?= ($RirekiDAO->get_UID_by_SyokuID($rireki->SyokuID))->UID ?>>
                        </div>
                    </div>
                    <?php $i++ ?>
                <?php endforeach ?>
            </div>
        </div>

        <!-- フッター部分 -->
        <div class="footer">
            <a href="shokutou.php" class="btn btn-primary">戻る</a><?php ?>
            <input type="hidden" name="suji" value=<?= $i ?>>
            <button type="submit" class="btn btn-primary" name="Resist">登録</a>
        </div>
    </form>
</body>
</html>