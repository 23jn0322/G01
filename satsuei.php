<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>写真撮影画面</title>
    <!-- 外部CSSファイルをリンク -->
    <link rel="stylesheet" href="css/satsuei.css"> <!-- styles.css のパスを指定 -->
    <link href="css/satsuei.css"rel="stylesheet" type="text/css" media="all">
</head>
<body>
    <!-- 戻るボタン（リンクとして遷移） -->
    <a href="shokutou.php">
        <button class="button1">
            ← 戻る
        </button>
    </a>
    <div class="camera-container">
        <div class="camera-preview">
            <img src="レシートmaga.jpg" alt="サンプル画像" />
       
        </div>
        <div class="controls">
            <button class="shutter-button" onclick="window.location.href='yomitori.php'"></button>
        </div>
    </div>

</body>

</html>
