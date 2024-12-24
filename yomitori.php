<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/yomitori.css"> <!-- 外部CSSファイルをリンク -->
</head>
<body>
    <div class="content-container">
        <!-- 画像を中央に配置 -->
        <div class="image-container">
            <img src="レシートmaga.jpg" alt="サンプル画像" />
        </div>

        <!-- テキストボックスを画像の下に配置 -->
        <div class="textarea-container">
            <imput type ="text" Value = "にんじん">サンチュ<br>
            <imput type ="text" Value = "大根">大葉<br>
            <imput type ="text" Value = "チンゲンサイ">チンゲンサイ<br>
            <imput type ="text" Value = "ピーマン">ピーマン<br>
            <imput type ="text" Value = "ながねぎ">ながねぎ<br>
        </div>

        <!-- ボタンをテキストボックスの下に配置 -->
        <div class="button-container">
            <button class="reset-button" onclick="window.location.href='satsuei.php'">撮り直し</button>
            <button class="reset-button" onclick="window.location.href='shokutou.php'">登録</button>
        </div>
    </div>
</body>
</html>
