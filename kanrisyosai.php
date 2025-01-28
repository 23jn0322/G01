<?php
require_once './helpers/FoodsDAO.php';
require_once './helpers/EiyouDAO.php';

$FoodsDAO = new FoodsDAO();
$EiyouDAO = new eiyouDAO();



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $SyokuName = $_POST['SyokuName'];
    $Eiyou_list = $EiyouDAO->get_NutrientsName();
    $Nutrients_list = $EiyouDAO->get_Nutrients_SyokuID($SyokuName);
    $FoodsSyousai = $FoodsDAO->get_foods_by_SyokuName($SyokuName);

    if(isset($_POST['Resist'])){
        $i = $_POST['suji'];
        $SyokuID = $EiyouDAO->get_SyokuID_by_SyokuName($SyokuName);

        for($i2 = 0; $i2 < $i; $i2++){
            $NID = $_POST['NID'.$i2];
            $IncludeNatri = $_POST['IncludeNatri'.$i2];

            $TF = $EiyouDAO->Update_Eiyou($SyokuID[0]["SyokuID"],$IncludeNatri,$NID);
        }
        $Nutrients_list = $EiyouDAO->get_Nutrients_SyokuID($SyokuName);

    }
}
$Flag = false;
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者食材詳細画面</title>
    <link rel="stylesheet" href="css/kanrisyosai.css">
    <link href="https://fonts.googleapis.com/css2?family=Kaisei+Opti&display=swap" rel="stylesheet">
</head>

<body>
    <!-- 戻るボタン -->
    <button onclick="window.location.href='kanri.php'" class="back-button">← 戻る</button>

    <h1>食材詳細</h1>

    <form action="" method="POST" name="form1" >
    <?php $i = 0; ?>
        <div class="input-section">
            <label for="ingredient-name">名称</label>
            <input type="text" id="ingredient-name" name="SyokuName" class="input-box" placeholder="" value=<?= $SyokuName ?>>

            <label for="category">中ジャンル</label>
            <input type="text" id="ingredient-name" name="MiddleGenreName" class="input-box" placeholder="" value=<?= $FoodsSyousai->MiddleGenreName ?>>

            <div class="checkbox-container">
                <label for="usual">
                    <input type="checkbox" id="usual" name="Usual" <?php if($FoodsSyousai->UsualFlag === true) {echo 'checked';}else{echo '';}?>> いつもの
                </label>
            </div>
        </div>

        <div class="container"></div>
            <label for="ingredient-name" class="label">購入単位</label>
            <input type="text" id="ingredient-name" class="input-box" placeholder="" value=<?= $FoodsSyousai->UnitName ?>>
        </div>


        <?php foreach(array_map(null, $Eiyou_list, $Nutrients_list) as [$Eiyou, $Nutrients]) : ?>
            <div class="container"></div>
            <label for="ingredient-name" class="label"><?= $Eiyou->NutrientsName  ?></label>
            <input type="text" id="ingredient-name" name = <?="IncludeNatri" . $i?> class="input-box" placeholder="" value=<?= $Nutrients->IncludeNatri ?>>
            <input type="hidden" name=<?="NID" . $i?> value=<?= $Eiyou->NID ?>>
            <input type="text" id="ingredient-name" class="input-box" placeholder="" value=<?= $Eiyou->IUnitName ?> readonly>
            </div>
            <?php $i++ ?>
        <?php endforeach ?>
    
        <div class="submit-container">
        <input type="hidden" name="suji" value=<?= $i ?>>
            <button type="submit" name = "Resist" class="submit-button">変更</button>
        </div>
    </form>



    <script>
        function confirmRegistration() {
            // 入力内容を取得
            const ingredientName = document.getElementById("ingredient-name").value;
            const category = document.getElementById("category").value;
            const usual = document.getElementById("usual").checked ? "はい" : "いいえ";

            // 確認メッセージを作成
            const message = `以下の内容で登録しますか？\n\n名称: ${ingredientName}\n中ジャンル: ${category}\nいつもの: ${usual}`;

            // 確認ダイアログを表示
            const userConfirmed = window.confirm(message);

            if (userConfirmed) {
                // ユーザーがOKを押した場合、登録処理を実行（ここでは単にログに出力するだけ）
                alert("登録が完了しました！");
                window.location.href = 'kanri.php';
            } else {
                // ユーザーがキャンセルを押した場合
                alert("登録をキャンセルしました。");
            }
        }


    </script>

</body>

</html>