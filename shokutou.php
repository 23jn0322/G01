<?php
require_once './helpers/FoodsDAO.php';

$FoodsDAO = new FoodsDAO();
$Foods_list = $FoodsDAO->get_foods();

?>
<!DOCTYPE html>
<html lang="ja">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/shokutou.css">
<link rel="stylesheet" href="css/rirekitoroku.css">

<body>
    <?php include "header.php" ?>
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
                        <a class="accordion__link" id="veggiesLink2">葉物野菜</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="veggiesLink3">根菜類</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="veggiesLink4">キノコ類</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="veggiesLink5">果実野菜</a>
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
                        <a class="accordion__link" id="fruitsLink3">柑橘類</a>
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
                        <a class="accordion__link" id="fishLink1">青魚</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="fishLink2">赤身魚</a>
                    </td>
                </tr>
                <tr></tr>
                <td>
                    <a class="accordion__link" id="fishLink3">白身魚</a>
                </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="fishLink4">海藻類</a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <a class="accordion__link" id="fishLink5">魚加工品</a>
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
            <h3>いつもの野菜:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if ($foods->UsualFlag == true && preg_match("/V/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie2" style="display: none;">
            <h3>葉物野菜:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V1/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie3" style="display: none;">
            <h3>根菜類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V2/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie4" style="display: none;">
            <h3>キノコ類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V3/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie5" style="display: none;">
            <h3>果実野菜:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V4/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie6" style="display: none;">
            <h3>豆類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V5/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-veggie7" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/V6/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-fruits1" style="display: none;">
            <h3>いつもの果物:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if ($foods->UsualFlag == true && preg_match("/F/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fruits2" style="display: none;">
            <h3>ドライフルーツ:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/F1/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fruits3" style="display: none;">
            <h3>柑橘類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/F2/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fruits4" style="display: none;">
            <h3>ベリー類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/F3/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fruits5" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/F4/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-meat1" style="display: none;">
            <h3>牛肉:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M1/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-meat2" style="display: none;">
            <h3>豚肉:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M2/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-meat3" style="display: none;">
            <h3>鶏肉:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M3/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-meat4" style="display: none;">
            <h3>肉加工品:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M4/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-meat5" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/M5/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-fish1" style="display: none;">
            <h3>青魚:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S1/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fish2" style="display: none;">
            <h3>赤身魚:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S2/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fish3" style="display: none;">
            <h3>白身魚:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S3/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fish4" style="display: none;">
            <h3>海藻類:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S4/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fish5" style="display: none;">
            <h3>魚加工品:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S5/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-fish6" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/S6/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-carbohy1" style="display: none;">
            <h3>お米:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/T1/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-carbohy2" style="display: none;">
            <h3>パン:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/T2/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-carbohy3" style="display: none;">
            <h3>麺:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/T3/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-carbohy4" style="display: none;">
            <h3>その他:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/T4/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>


        <div id="chk-egg1" style="display: none;">
            <h3>卵:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/E1/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
        <div id="chk-egg2" style="display: none;">
            <h3>牛乳:</h3>
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/E2/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>

        <div id="chk-soy" style="display: none;">
            <?php foreach ($Foods_list as $foods) : ?>
                <?php if (preg_match("/D1/", $foods->MiddleGenreID)) : ?>
                    <label><input type="checkbox" name=<?= $foods->SyokuID ?> value=<?= $foods->SyokuName ?>><?= $foods->SyokuName ?></label>
                <?php endif; ?>
            <?php endforeach ?>
            <br>
        </div>
    </div>
    <div class=toroku>
        <button id="tuika">追加</button><br>
        <div>
            <a href="satsuei.php"><img src="カメラ２.png" alt="カメラ画像" /></a>
        </div>
        <p>↑撮影はこちら</p>
    </div>

    <div class="title">買い物登録</div>
    <div class="container">
        <div class="content">
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: 牛肉" value="牛肉">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: ほうれん草" value="ほうれん草">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: にんじん" value="にんじん">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: 大根" value="大根">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: りんご" value="りんご">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- フッター部分 -->
    <div class="footer">
        <a href="home.php" class="small-button">冷蔵庫in</a>
    </div>
    </div>
</body>

<script src="shokutou.js"></script>

</html>