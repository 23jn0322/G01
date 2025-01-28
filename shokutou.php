<?php
    require_once './helpers/FoodsDAO.php';
    require_once './helpers/SyokutouDAO.php';
    require_once './helpers/MemberDAO.php';

    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!empty($_SESSION['Member'])) {
        $Member = $_SESSION['Member'];
    }
    else{
        header('Location: login.php');
        exit;
    }

    $FoodsDAO = new FoodsDAO();
    $SyokutouDAO = new SyokutouDAO();
    $Foods_list = $FoodsDAO->get_foods();
    
    $food[]=NULL;
    $i2 = 0;
    $TF = false;
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if (isset($_POST['add'])){
            $food = $_POST['food'];
        }        
        elseif(isset($_POST['Resist'])){
            $i = $_POST['suji'];
            for($i2 = 0; $i2 < $i; $i2++){
                $Syoku = $SyokutouDAO->get_SyokuID_by_SyokuName($_POST['SyokuName'.$i2]); 
                $Quantity = $_POST['Quantity'.$i2]; 
                $unit = $SyokutouDAO->get_UID_by_UnitName($_POST['UnitName'.$i2]); 
                if($Quantity > 0){ 
                    $TF = $SyokutouDAO->insert_syokutou($Member->MID,$Syoku->SyokuID,$Quantity,$unit->UID);
                }
            }
            if ($TF == true){
                header('Location: home.php');
                exit;
            }
    }
}
?>
<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php include "header.php" ?>
<link rel="stylesheet" href="css/shokutou.css">
<link rel="stylesheet" href="css/rirekitoroku.css">

    <script>
        // チェックされた項目を表示する関数
        function showCheckedItems() {
            var checkboxes = document.querySelectorAll('input[class="form-check-input" type="checkbox"]');
            var selectedItems = [];

            checkboxes.forEach(function(checkbox) {
                if (checkbox.checked) {
                    selectedItems.push(checkbox.value);
                }
            });

            // 選択された項目を表示
            var result = document.getElementById('result');
            result.innerHTML = selectedItems.join(', ') || '選択されていません';
        }
    </script>
<body>
    
    <a href="rirekitoroku.php" class="rireki">
        履歴から登録する
    </a>
    <div class="genre">
        <details class="accordion-003">
            <summary>野菜</summary>
            <table border="1" class="table">
                <tr>
                    <td>
                        <a class="accordion__link" id="veggiesLink1">いつもの野菜</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="veggiesLink2">葉・茎類</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="veggiesLink3">芋・根菜類</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="veggiesLink4">キノコ類</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="veggiesLink5">果実類</a>
                    </td>
                </tr>
                <tr>
                    <td><a class="accordion__link" id="veggiesLink6">豆類</a>
                    </td>
                </tr>
            </table>
        </details>

        <details class="accordion-003">
            <summary>果物</summary>
            <table border="1" class="table">
                <tr>
                    <td>
                        <a class="accordion__link" id="fruitsLink1">いつもの果物</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="fruitsLink2">ドライフルーツ</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="fruitsLink3">果物</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="fruitsLink4">ベリー類</a>
                    </td>
                </tr>
            </table>
        </details>

        <details class="accordion-003">
            <summary>お肉</summary>
            <table border="1" class="table">
                <tr>
                    <td>
                        <a class="accordion__link" id="meatLink1">牛肉</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="meatLink2">豚肉</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="meatLink3">鶏肉</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="meatLink4"> 肉加工品</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="meatLink5">その他</a>
                    </td>
                </tr>
            </table>
        </details>

        <details class="accordion-003">
            <summary>お魚</summary>
            <table border="1" class="table">
                <tr>
                    <td>
                        <a class="accordion__link" id="fishLink1">赤身魚</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="fishLink2">白身魚</a>
                    </td>
                </tr>
                <tr></tr>
                <td>
                    <a class="accordion__link" id="fishLink3">甲殻・貝類</a>
                </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="fishLink4">魚加工品</a>
                    </td>
                </tr>
            </table>
        </details>

        <details class="accordion-003">
            <summary>炭水化物</summary>
            <table border="1" class="table">
                <tr>
                    <td>
                        <a class="accordion__link" id="carbohyLink1">お米</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="carbohyLink2">パン</a>
                    </td>
                </tr>
                <tr>
                    <td><a class="accordion__link" id="carbohyLink3">麺</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="carbohyLink4">その他</a>
                    </td>
                </tr>
            </table>
        </details>

        <details class="accordion-003">
            <summary>卵・牛乳</summary>
            <table border="1" class="table">
                <tr>
                    <td>
                        <a class="accordion__link" id="eggLink1">卵</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="eggLink2">牛乳・乳製品</a>
                    </td>
                </tr>
            </table>
        </details>

        <details class="accordion-003">
            <summary>大豆</summary>
            <table border="1" class="table">
                <tr>
                    <td>
                        <a class="accordion__link" id="soyLink">大豆製品</a>
                    </td>
                </tr>
            </table>
        </details>
    </div>


    <div class="choice">
        <div id="chk-veggie1" style="display: none;">
            <h3 >いつもの野菜:</h3>
            <form method="post" action="">
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if ($foods->UsualFlag == true && preg_match("/V/", $foods->MiddleGenreID)) : ?>
                    <label class="form-check-label" ><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie2" style="display: none;">
            <h3>葉・茎類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V1/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie3" style="display: none;">
            <h3>芋・根菜類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V2/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie4" style="display: none;">
            <h3>キノコ類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V3/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie5" style="display: none;">
            <h3>果実類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V4/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie6" style="display: none;">
            <h3>豆類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V5/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie7" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V6/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-fruits1" style="display: none;">
            <h3>いつもの果物:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if ($foods->UsualFlag == true && preg_match("/F/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fruits2" style="display: none;">
            <h3>ドライフルーツ:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/F1/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fruits3" style="display: none;">
            <h3>果物:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/F2/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fruits4" style="display: none;">
            <h3>ベリー類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/F3/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fruits5" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/F4/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-meat1" style="display: none;">
            <h3>牛肉:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M1/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-meat2" style="display: none;">
            <h3>豚肉:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M2/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-meat3" style="display: none;">
            <h3>鶏肉:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M3/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-meat4" style="display: none;">
            <h3>肉加工品:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M4/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-meat5" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M5/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-fish1" style="display: none;">
            <h3>赤身魚:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S1/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fish2" style="display: none;">
            <h3>白身魚:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S2/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fish3" style="display: none;">
            <h3>甲殻・貝類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S3/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fish4" style="display: none;">
            <h3>魚加工品:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S4/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-carbohy1" style="display: none;">
            <h3>お米:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/T1/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-carbohy2" style="display: none;">
            <h3>パン:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/T2/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-carbohy3" style="display: none;">
            <h3>麺:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/T3/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-carbohy4" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/T4/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>


        <div id="chk-egg1" style="display: none;">
            <h3>卵:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/E1/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-egg2" style="display: none;">
            <h3>牛乳:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/E2/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-soy" style="display: none;">
            <h3>大豆製品</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/D1/", $foods->MiddleGenreID)) : ?>
                    <label><input class="form-check-input" class="form-check-input" type="checkbox" name="food[]" id=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
    </div>
    <div class=toroku>
      <input type ="submit" name="add" value = "追加" class="btn btn-success"><br>
    </div>

    <?php $i = 0; ?>
    <div class="title">買い物登録</div>
    <form  action="" method="POST">
    <div class="container">
        <div class="content">
            <?php if(!(is_null($food[0]))) :?>
                <?php foreach ($food as $value)  :?>
                    <div class="item-row">
                    <?php if (!$food ="") : ?>
                        <input type="text"  readonly class="item-input" name = <?= "SyokuName".$i ?> value=<?= $value ?>>
                        <div class="row">
                            <input type="text" value="0" class="quantity-input" name = <?= "Quantity".$i ?>><!--forぶんでそれぞれのnameの後に.で1,2,3のように数字を文字列連結して判断させる -->
                            <input name=<?= "UnitName" . $i ?> readonly class="unittext" id=<?= $SyokutouDAO->get_syokutou_by_UID($value)->UID ?> value=<?= $SyokutouDAO->get_syokutou_by_UID($value)->UnitName ?>>
                        </div>
                    </div>
                    <?php endif ?>
                    <?php $i++ ?>
                <?php endforeach ?>
            <?php endif?>

        
        </div>
    </div>
    <!-- フッター部分 -->
    <div class="footer">
            <input type="hidden" name="suji" value=<?= $i ?>>
        <button type="submit" name="Resist" class="btn btn-success">登録</a>
    </form>
    </div>
    </div>
</body>

<script src="shokutou.js"></script>

</html>