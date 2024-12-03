<!DOCTYPE html>
<html lang="ja">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/shokutou.css">
    <link rel="stylesheet" href="css/rirekitoroku.css">
    
    <?php include "header.php" ?>
</header>
<body>
<div class="header__inner"></div>
<button id="js-hamburger">
</button>
<div class="header__nav-area js-nav-area -active" id="navigation">
    <nav id="js-global-navigation" class="global-navigation">
        <ul class="global-navigation__list">
            <li>
                <a href="rirekitoroku.php" class="global-navigation__link">
                    履歴から登録する
                </a>
            </li>
            <li>
                <button type="button" class="global-navigation__link -accordion js-sp-accordion-trigger"
                    aria-expanded='false' aria-controls="accordion1">
                    野菜
                </button>
                <div id="accordion1" class="accordion js-accordion">
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
                </div>
            </li>
            <li>
                <button type="button" class="global-navigation__link -accordion js-sp-accordion-trigger"
                    aria-expanded='false' aria-controls="accordion1">
                    果物
                </button>
                <div id="accordion1" class="accordion js-accordion">
                    <table border="1" class="table">
                        <tr>
                            <td>
                            <a  class="accordion__link" id="fruitsLink1">いつもの果物</a>
                        </td>
                        </tr>
                        <tr>
                            <td>
                            <a  class="accordion__link" id="fruitsLink2">ドライフルーツ</a>
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
                </div>
            </li>
            <li>
                <button type="button" class="global-navigation__link -accordion js-sp-accordion-trigger"
                    aria-expanded='false' aria-controls="accordion1">
                    お肉
                </button>
                <div id="accordion1" class="accordion js-accordion">
                    <table border="1" class="table">
                        <tr>
                            <td>
                            <a  class="accordion__link" id="meatLink1">牛肉</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <a  class="accordion__link" id="meatLink2">豚肉</a>
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
                </div>
            </li>
            <li>
                <button type="button" class="global-navigation__link -accordion js-sp-accordion-trigger"
                    aria-expanded='false' aria-controls="accordion1">
                    お魚
                </button>
                <div id="accordion1" class="accordion js-accordion">
                    <table border="1" class="table">
                        <tr>
                            <td>
                                 <a  class="accordion__link" id="fishLink1">青魚</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <a  class="accordion__link" id="fishLink2">赤身魚</a>
                        </td>
                        </tr>
                        <tr></tr>
                            <td>
                            <a  class="accordion__link" id="fishLink3">白身魚</a>
                        </td>
                        </tr>
                        <tr>
                            <td>
                            <a class="accordion__link" id="fishLink4">海藻類</a>
                        </td>
                        </tr>
                        <tr>
                            <td>
                            <a class="accordion__link"id="fishLink5">魚加工品</a>
                        </td>
                        </tr>
                    </table>
                </div>
            </li>
            <li>
                <button type="button" class="global-navigation__link -accordion js-sp-accordion-trigger"
                    aria-expanded='false' aria-controls="accordion1">
                    炭水化物
                </button>
                <div id="accordion1" class="accordion js-accordion">
                    <table border="1" class="table">
                        <tr>
                            <td>
                            <a  class="accordion__link"id="carbohyLink1">お米</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a  class="accordion__link"id="carbohyLink2">パン</a>
                        </td>
                        </tr>
                        <tr>
                            <td><a class="accordion__link"id="carbohyLink3">麺</a>
                        </td>
                        </tr>
                        <tr>
                            <td>
                            <a class="accordion__link"id="carbohyLink4">その他</a>
                        </td>
                        </tr>
                    </table>
                </div>
            </li>
            <li>
                <button type="button" class="global-navigation__link -accordion js-sp-accordion-trigger"
                    aria-expanded='false' aria-controls="accordion1">
                    卵・牛乳
                </button>
                <div id="accordion1" class="accordion js-accordion">
                    <table border="1" class="table">
                        <tr>
                            <td>
                                 <a  class="accordion__link" id="eggLink1">卵</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                            <a  class="accordion__link" id="eggLink2">牛乳・乳製品</a>
                        </td>
                        </tr>
                    </table>
                </div>
            </li>
            <li>
                <button type="button" class="global-navigation__link -accordion js-sp-accordion-trigger"
                    aria-expanded='false' aria-controls="accordion1">
                    大豆
                </button>
                <div id="accordion1" class="accordion js-accordion">
                    <table border="1" class="table">
                        <tr>
                            <td>
                                 <a  class="accordion__link" id="soyLink">大豆製品</a>
                            </td>
                        </tr>
                    </table>
                </div>
            </li>
        </ul>
        <div id="js-focus-trap" tabindex="0"></div>
        
    </nav>  
    <div class="choice">
        <div id="chk-veggie1" style="display: none;">
            <h3>いつもの野菜:</h3>
            <label><input type="checkbox" name="veggie" value="トマト"> トマト</label>
            <label><input type="checkbox" name="veggie" value="キュウリ"> キュウリ</label><br>
        </div>
        <div id="chk-veggie2" style="display: none;">
            <h3>葉物野菜:</h3>
            <label><input type="checkbox" name="veggie" value="キャベツ"> キャベツ</label><br>
            <label><input type="checkbox" name="veggie" value="キュウリ"> ほうれん草</label><br>
        </div>
        <div id="chk-veggie3" style="display: none;">
            <h3>根菜類:</h3>
            <label><input type="checkbox" name="veggie" value="トマト">根菜１</label><br>
            <label><input type="checkbox" name="veggie" value="キュウリ">根菜２</label><br>
        </div>
        <div id="chk-veggie4" style="display: none;">
            <h3>キノコ類:</h3>
            <label><input type="checkbox" name="veggie" value="トマト"> きのこ１</label><br>
            <label><input type="checkbox" name="veggie" value="キュウリ"> キノコ２</label><br>
        </div>
        <div id="chk-veggie5" style="display: none;">
            <h3>果実野菜:</h3>
            <label><input type="checkbox" name="veggie" value="トマト"> 果実野菜１</label><br>
            <label><input type="checkbox" name="veggie" value="キュウリ"> 果実野菜２</label><br>
        </div>
        <div id="chk-veggie6" style="display: none;">
            <h3>豆類:</h3>
            <label><input type="checkbox" name="veggie" value="トマト"> 豆類１</label><br>
            <label><input type="checkbox" name="veggie" value="キュウリ"> 豆類２</label><br>
        </div>
        <div id="chk-veggie7" style="display: none;">
            <h3>その他:</h3>
            <label><input type="checkbox" name="veggie" value="トマト"> その他１</label><br>
            <label><input type="checkbox" name="veggie" value="キュウリ"> その他２</label><br>
        </div>




        <div id="chk-fruits1" style="display: none;">
            <h3>いつもの果物:</h3>
            <label><input type="checkbox" name="fruits" value="トマト">いつもの果物１</label><br>
            <label><input type="checkbox" name="fruits" value="キュウリ">いつもの果物２</label><br>
        </div>
        <div id="chk-fruits2" style="display: none;">
            <h3>ドライフルーツ:</h3>
            <label><input type="checkbox" name="fruits" value="トマト">ドライフルーツ１</label><br>
            <label><input type="checkbox" name="fruits" value="キュウリ">ドライフルーツ２</label><br>
        </div>
        <div id="chk-fruits3" style="display: none;">
            <h3>柑橘類:</h3>
            <label><input type="checkbox" name="fruits" value="トマト">柑橘類</label><br>
            <label><input type="checkbox" name="fruits" value="キュウリ">柑橘類</label><br>
        </div>
        <div id="chk-fruits4" style="display: none;">
            <h3>ベリー類:</h3>
            <label><input type="checkbox" name="fruits" value="トマト">ベリー類１</label><br>
            <label><input type="checkbox" name="fruits" value="キュウリ">ベリー類２</label><br>
        </div>
        <div id="chk-fruits5" style="display: none;">
            <h3>その他:</h3>
            <label><input type="checkbox" name="fruits" value="トマト">その他１</label><br>
            <label><input type="checkbox" name="fruits" value="キュウリ">その他２</label><br>
        </div>




        <div id="chk-meat1" style="display: none;">
            <h3>牛肉:</h3>
            <label><input type="checkbox" name="meat" value="トマト">牛肉１</label><br>
            <label><input type="checkbox" name="meat" value="キュウリ">牛肉２</label><br>
        </div>
        <div id="chk-meat2" style="display: none;">
            <h3>豚肉:</h3>
            <label><input type="checkbox" name="meat" value="トマト"> 豚肉１</label><br>
            <label><input type="checkbox" name="meat" value="キュウリ">豚肉２</label><br>
        </div>
        <div id="chk-meat3" style="display: none;">
            <h3>鶏肉:</h3>
            <label><input type="checkbox" name="meat" value="トマト"> 鶏肉１</label><br>
            <label><input type="checkbox" name="meat" value="キュウリ">鶏肉２</label><br>
        </div>
        <div id="chk-meat4" style="display: none;">
            <h3>肉加工品:</h3>
            <label><input type="checkbox" name="meat" value="トマト">肉加工品１</label><br>
            <label><input type="checkbox" name="meat" value="キュウリ"> 肉加工品２</label><br>
        </div>
        <div id="chk-meat5" style="display: none;">
            <h3>その他:</h3>
            <label><input type="checkbox" name="meat" value="トマト"> その他１</label><br>
            <label><input type="checkbox" name="meat" value="キュウリ">その他２</label><br>
        </div>








        <div id="chk-fish1" style="display: none;">
            <h3>青魚:</h3>
            <label><input type="checkbox" name="fish" value="トマト"> 青魚１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> 青魚２</label><br>
        </div>
        <div id="chk-fish2" style="display: none;">
            <h3>赤身魚:</h3>
            <label><input type="checkbox" name="fish" value="トマト">赤身魚１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> 赤身魚２</label><br>
        </div>
        <div id="chk-fish3" style="display: none;">
            <h3>白身魚:</h3>
            <label><input type="checkbox" name="fish" value="トマト"> 白身魚１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> 白身魚２</label><br>
        </div>
        <div id="chk-fish4" style="display: none;">
            <h3>海藻類:</h3>
            <label><input type="checkbox" name="fish" value="トマト"> 海藻類１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> 海藻類２</label><br>
        </div>
        <div id="chk-fish5" style="display: none;">
            <h3>魚加工品:</h3>
            <label><input type="checkbox" name="fish" value="トマト"> 魚加工品１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> 魚加工品２</label><br>
        </div>
        <div id="chk-fish6" style="display: none;">
            <h3>その他:</h3>
            <label><input type="checkbox" name="fish" value="トマト"> その他１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> その他２</label><br>
        </div>





        <div id="chk-carbohy1" style="display: none;">
            <h3>お米:</h3>
            <label><input type="checkbox" name="carbohy" value="トマト"> お米１</label><br>
            <label><input type="checkbox" name="carbohy" value="キュウリ"> お米２</label><br>
        </div>
        <div id="chk-carbohy2" style="display: none;">
            <h3>パン:</h3>
            <label><input type="checkbox" name="carbohy" value="トマト"> パン１</label><br>
            <label><input type="checkbox" name="carbohy" value="キュウリ"> パン２</label><br>
        </div>
        <div id="chk-carbohy3" style="display: none;">
            <h3>麺:</h3>
            <label><input type="checkbox" name="carbohy" value="トマト"> 麺１</label><br>
            <label><input type="checkbox" name="carbohy" value="キュウリ"> 麺２</label><br>
        </div>
        <div id="chk-carbohy4" style="display: none;">
            <h3>その他:</h3>
            <label><input type="checkbox" name="carbohy" value=""> その他１</label><br>
            <label><input type="checkbox" name="carbohy" value="キュウリ"> その他２</label><br>
        </div>


        <div id="chk-egg1" style="display: none;">
            <h3>卵:</h3>
            <label><input type="checkbox" name="fish" value="トマト"> 卵１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> 卵２</label><br>
        </div>
        <div id="chk-egg2" style="display: none;">
            <h3>牛乳:</h3>
            <label><input type="checkbox" name="fish" value="トマト">乳製品１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> 乳製品２</label><br>
        </div>

        <div id="chk-soy" style="display: none;">
            <h3>大豆製品:</h3>
            <label><input type="checkbox" name="fish" value="トマト"> 大豆製品１</label><br>
            <label><input type="checkbox" name="fish" value="キュウリ"> 大豆製品２</label><br>
        </div>
        </div>
        </div>
<div class=toroku>
<button id="tuika">追加</button><br>
<div>
<a href="satsuei.php"><img src="カメラ２.png" alt="カメラ画像" /></a>
</div>
<p>↑撮影はこちら</p>

<div class="title">買い物登録</div>
  <div class="container">
    <div class="content">
      <div class="items">
        <div class="item-row">
          <input type="text" class="item-input" placeholder="例: 牛肉" value="牛肉">
        </div>
        <div class="item-row">
          <input type="text" class="item-input" placeholder="例: ほうれん草" value="ほうれん草">
        </div>
        <div class="item-row">
          <input type="text" class="item-input" placeholder="例: にんじん" value="にんじん">
        </div>
        <div class="item-row">
            <input type="text" class="item-input" placeholder="例: 大根" value="大根">
          </div>
        <div class="item-row">
            <input type="text" class="item-input" placeholder="例: りんご" value="りんご">
          </div>
      </div>
      <div class="quantities">
        <div class="row">
          <input type="number" value="100" class="quantity-input">
          <select>
            <option value="g">g</option>
            <option value="kg">kg</option>
            <option value="束">μg</option>
            <option value="袋">本</option>
            <option value="g">玉</option>
            <option value="kg">個</option>
            <option value="束">束</option>
            <option value="袋">袋</option>
          </select>
        </div>
        <div class="row">
          <input type="number" value="2" class="quantity-input">
          <select>
            <option value="g">g</option>
            <option value="kg">kg</option>
            <option value="束">μg</option>
            <option value="袋">本</option>
            <option value="g">玉</option>
            <option value="kg">個</option>
            <option value="束">束</option>
            <option value="袋">袋</option>
          </select>
        </div>
        <div class="row">
          <input type="number" value="1" class="quantity-input">
          <select>
            <option value="g">g</option>
            <option value="kg">kg</option>
            <option value="束">μg</option>
            <option value="袋">本</option>
            <option value="g">玉</option>
            <option value="kg">個</option>
            <option value="束">束</option>
            <option value="袋">袋</option>
          </select>
        </div>
        <div class="row">
            <input type="number" value="1" class="quantity-input">
            <select>
              <option value="g">g</option>
              <option value="kg">kg</option>
              <option value="束">μg</option>
              <option value="袋">本</option>
              <option value="g">玉</option>
              <option value="kg">個</option>
              <option value="束">束</option>
              <option value="袋">袋</option>
            </select>
          </div>  <div class="row">
            <input type="number" value="3" class="quantity-input">
            <select>
              <option value="g">g</option>
              <option value="kg">kg</option>
              <option value="束">μg</option>
              <option value="袋">本</option>
              <option value="g">玉</option>
              <option value="kg">個</option>
              <option value="束">束</option>
              <option value="袋">袋</option>
            </select>
          </div>
      </div>
    </div>
    <!-- フッター部分 -->
    <div class="footer">
      <a href="home.php" class="small-button">冷蔵庫in</a>
    </div>
  </div>
</div>
</body>

<script src="shokutou.js"></script>
</html>