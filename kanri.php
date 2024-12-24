<!DOCTYPE html>
<html lang="ja">
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/kanri.css">
    <h1>管理者画面</h1>
</header>
<body>
<a href="kanrisyokutou.php"><button>登録</button></a><br>
<div class="container">
    <nav class="nav1">
        <table border="1" class="table">
            <tr>
                <td>
                    <a class="accordion__link" id="veggiesLink">野菜</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="accordion__link" id="fruitsLink">果物</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="accordion__link" id="meatLink">お肉</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="accordion__link" id="fishLink">お魚</a>
                </td>
            </tr>
            <tr>
                <td>
                    <a class="accordion__link" id="carbohyLink">炭水化物</a>
                </td>
            </tr>
        </table>

    </nav>  

    <div class="choice">
        <div id="link-veggie"  style="display: none;">
            <h3>いつもの野菜：</h3>
            <a href="kanrisyosai.php"> キャベツ</a><br>
            <a href="kanrisyosai.php"> にんじん</a><br>
            <h3>葉物野菜：</h3>
            <a href="kanrisyosai.php"> 葉物野菜</a><br>
            <a href="kanrisyosai.php"> 葉物野菜</a><br>
            <h3>根菜類：</h3>
            <a href="kanrisyosai.php"> 根菜類</a><br>
            <a href="kanrisyosai.php"> 根菜類</a><br>
            <h3>キノコ類：</h3>
            <a href="kanrisyosai.php"> キノコ類</a><br>
            <a href="kanrisyosai.php"> キノコ類</a><br>
            <h3>果実野菜：</h3>
            <a href="kanrisyosai.php"> 果実野菜</a><br>
            <a href="kanrisyosai.php"> 果実野菜</a><br>
            <h3>豆類：</h3>
            <a href="kanrisyosai.php"> 豆類</a><br>
            <a href="kanrisyosai.php"> 豆類</a><br>
            <h3>その他：</h3>
            <a href="kanrisyosai.php"> その他</a><br>
            <a href="kanrisyosai.php"> その他</a><br>
        </div>




        <div id="link-fruits" style="display: none;">
            <h3>いつもの果物：</h3>
            <a href="kanrisyosai.php"> いつもの果物</a><br>
            <a href="kanrisyosai.php"> いつもの果物</a><br>

            <h3>ドライフルーツ：</h3>
            <a href="kanrisyosai.php"> ドライフルーツ</a><br>
            <a href="kanrisyosai.php"> ドライフルーツ</a><br>

            <h3>柑橘類：</h3>
            <a href="kanrisyosai.php"> 柑橘類</a><br>
            <a href="kanrisyosai.php"> 柑橘類</a><br>

            <h3>ベリー類：</h3>
            <a href="kanrisyosai.php"> ベリー類</a><br>
            <a href="kanrisyosai.php"> ベリー類</a><br>
            
            <h3>その他：</h3>
            <a href="kanrisyosai.php"> その他</a><br>
            <a href="kanrisyosai.php"> その他</a><br>
        </div>




        <div id="link-meat" style="display: none;">
            <h3>牛肉：</h3>
            <a href="kanrisyosai.php"> 牛肉</a><br>
            <a href="kanrisyosai.php"> 牛肉</a><br>

            <h3>豚肉：</h3>
            <a href="kanrisyosai.php"> 豚肉</a><br>
            <a href="kanrisyosai.php"> 豚肉</a><br>

            <h3>鶏肉：</h3>
            <a href="kanrisyosai.php"> 鶏肉</a><br>
            <a href="kanrisyosai.php"> 鶏肉</a><br>

            <h3>肉加工品：</h3>
            <a href="kanrisyosai.php"> 肉加工品</a><br>
            <a href="kanrisyosai.php"> 肉加工品</a><br>

            <h3>その他：</h3>
            <a href="kanrisyosai.php"> その他</a><br>
            <a href="kanrisyosai.php"> その他</a><br>
        </div>








        <div id="link-fish" style="display: none;">
            <h3>青魚:</h3>
            <a href="kanrisyosai.php"> 青魚</a><br>
            <a href="kanrisyosai.php"> 青魚</a><br>

            <h3>赤身魚:</h3>
            <a href="kanrisyosai.php"> 赤身魚</a><br>
            <a href="kanrisyosai.php"> 赤身魚</a><br>

            <h3>白身魚:</h3>
            <a href="kanrisyosai.php"> 白身魚</a><br>
            <a href="kanrisyosai.php"> 白身魚</a><br>

            <h3>海藻類:</h3>
            <a href="kanrisyosai.php"> 海藻類</a><br>
            <a href="kanrisyosai.php"> 海藻類</a><br>

            <h3>魚加工品:</h3>
            <a href="kanrisyosai.php"> 魚加工品</a><br>
            <a href="kanrisyosai.php"> 魚加工品</a><br>

            <h3>その他:</h3>
            <a href="kanrisyosai.php"> その他</a><br>
            <a href="kanrisyosai.php"> その他</a><br>

        </div>





        <div id="link-carbohy" style="display: none;">
            <h3>お米:</h3>
            <a href="kanrisyosai.php"> お米</a><br>
            <a href="kanrisyosai.php"> お米</a><br>

            <h3>パン</h3>
            <a href="kanrisyosai.php"> パン</a><br>
            <a href="kanrisyosai.php"> パン</a><br>

            <h3>麺:</h3>
            <a href="kanrisyosai.php"> 麺</a><br>
            <a href="kanrisyosai.php"> 麺</a><br>

            <h3>その他の選択:</h3>
            <a href="kanrisyosai.php"> その他</a><br>
            <a href="kanrisyosai.php"> その他</a><br>
        </div>
    </div>
</div>
</body>
<script src="kanri.js"></script>
</html>