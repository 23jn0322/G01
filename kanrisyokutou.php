<?php
    require_once './helpers/kanriDAO.php';
    require_once './helpers/EiyouDAO.php';
    require_once './helpers/FoodsDAO.php';

    $KanriDAO = new KanriDAO();
    $EiyouDAO = new eiyouDAO();
    $FoodsDAO = new FoodsDAO();


    $MiddleGenre = $KanriDAO->get_MiddleGenre();
    $BuyUnit = $KanriDAO->get_BuyUnit();
    $Eiyou_list = $EiyouDAO->get_NutrientsName();

    $Flag = false;
    $TF = true;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST['SyokuID']) and isset($_POST['SyokuName']) and isset($_POST['UsualFlag']) and isset($_POST['MiddleGenre'])){
            $SyokuID = $_POST['SyokuID'];
            $SyokuName = $_POST['SyokuName'];
            if(isset($_POST['UsualFlag'])){
                $UsualFlag = 1;
            }else {
                $UsualFlag = 0;
            }
            $MiddleGenreID = $_POST['MiddleGenre'];
            $FoodsDAO->insert_Foods($SyokuID, $SyokuName, $UsualFlag, $MiddleGenreID);
            
            $UID = $_POST['UID'];
            $NID = $_POST['NID'];
            var_dump($UsualFlag);
            $SyokuID = $_POST['SyokuID'];
            $IncludeNutri = $_POST['Nutrients'];
            $FoodsDAO->insert_Nutrients($UID, $NID, $SyokuID, $IncludeNutri);

            header('Location: kanri.php');
            exit;
        }else{
            $TF = false;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者食材登録画面</title>
    <link rel="stylesheet" href="css/kanrisyokutou.css">
   
</head>
<body>
    <button onclick="window.location.href='kanri.php'" class="back-button">← 戻る</button>
    <h1>新規食材登録</h1>
    <?php if($TF == false) :?>
        <h2 class='error'>※未入力の箇所があります<h2>
    <?php endif ?>
    <form action="" method="POST" name="form1">
    <!-- 食材名称 -->
    <div class="container">
        <label for="ingredient-name" class="label">食材ID</label>
        <input type="text" id="ingredient-name" name="SyokuID" class="input-box" placeholder="">
    </div>
    <div class="container">
        <label for="ingredient-name" class="label">名称</label>
        <input type="text" id="ingredient-name" name="SyokuName" class="input-box" placeholder="">
    </div>

    <!-- 中ジャンル -->
    <div class="container">
        <label for="category" class="label">中ジャンル</label>
        <select name="MiddleGenre" id="category" class="dropdown">
            <option value="">選択してください</option>
            <?php foreach($MiddleGenre as $Genre) : ?>
                <option  value=<?=$Genre->MiddleGenreID ?>><?= $Genre->MiddleGenreName ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <!-- いつもの -->
    <div class="container">
        <label for="usual" class="label">いつもの</label>
        <input type="checkbox" id="usual" name="UsualFlag">
    </div>

    <div class="container"></div>
        <label for="ingredient-name" class="label">購入単位</label>
        <select name="UID" id="category" class="dropdown">
            <option value="">選択してください</option>
            <?php foreach($BuyUnit as $Unit) : ?>
                <option name="BuyUnit" value=<?= $Unit->UID ?>><?= $Unit->UnitName ?></option>
            <?php endforeach ?>
        </select>
    </div>

    <?php foreach($Eiyou_list as $Eiyou) : ?>
            <div class="container"></div>
            <label for="ingredient-name" class="label"><?= $Eiyou->NutrientsName ?></label>
            <input type="hidden" name="NID[]" Value= <?= $Eiyou->NID ?>> 
            <input type="text" id="ingredient-name" class="input-box" name="Nutrients[]" placeholder="" value="0">
            <input type="text" id="ingredient-name" class="input-box" name="UnitName" placeholder="" value=<?= $Eiyou->IUnitName ?> readonly>
            </div>
    <?php endforeach ?>

        <div class="submit-container">
            <button type="submit" class="submit-button" >登録</button>
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
