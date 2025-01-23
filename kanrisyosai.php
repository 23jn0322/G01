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
}   
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者食材詳細画面</title>
    <link rel="stylesheet" href="css/kanrisyosai.css">
</head>

<body>
    <!-- 戻るボタン -->
    <button onclick="window.location.href='kanri.php'" class="back-button">← 戻る</button>

    <h1>食材詳細</h1>

    <form action="" method="POST" >
        <div class="input-section">
            <label for="ingredient-name">名称</label>
            <input type="text" id="ingredient-name" name="Syokuname" class="input-box" placeholder="" value=<?= $SyokuName ?>>

            <label for="category">中ジャンル</label>
            <input type="text" id="ingredient-name" name="MiddleGenreName" class="input-box" placeholder="" value=<?= $FoodsSyousai->MiddleGenreName ?>>

            <div class="checkbox-container">
                <label for="usual">
                    <input type="checkbox" id="usual" checked=<?php if($FoodsSyousai->UsualFlag == true) {echo 'checked';}else{echo '';}?>> いつもの
                </label>
            </div>
        </div>

        <div class="container"></div>
            <label for="ingredient-name" class="label">購入単位</label>
            <input type="text" id="ingredient-name" class="input-box" placeholder="" value=<?= $FoodsSyousai->UnitName ?>>
        </div>


        <?php foreach(array_map(null, $Eiyou_list, $Nutrients_list) as [$Eiyou, $Nutrients]) : ?>
            <div class="container"></div>
            <label for="ingredient-name" class="label"><?= $Eiyou->NutrientsName ?></label>
            
            <input type="text" id="ingredient-name" class="input-box" placeholder="" value=<?= $Nutrients->IncludeNatri ?>>
            <input type="text" id="ingredient-name" class="input-box" placeholder="" value=<?= $Eiyou->IUnitName ?> readonly>
            </div>
        <?php endforeach ?>
    
        <div class="submit-container">

            <button class="submit-button" onclick="confirmRegistration()">登録</button>
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