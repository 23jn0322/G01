<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員情報変更</title>
    <link rel="stylesheet" href="css/kaiinhenkou.css">
    <link href="css/header.css" rel="stylesheet">
    <script>
        // 家族構成「あり」のボタンを押した時にページ遷移
        function redirectToKazokuKousei() {
            window.location.href = "kazokukousei.php";  // kazokukousei.php に遷移
        }
    </script>
</head>
<body>
<header>
    <?php include "header.php" ?>
</header>

<form action="" method="POST">
    <!-- ニックネーム -->
    <div>
        <label for="nickname">ニックネーム:</label>
        <input type="text" id="nickname" name="nickname" required>
    </div>
    <br>

    <!-- 生年月日 -->
    <div class="birth-henko" id="birthdate-henko">
        <label for="birth_year">生年月日</label>
        <div class="date-inputs">
            <input type="text" id="birth_year" name="birth_year" required>
            <label for="birth_year">年</label>
            
            <input type="text" id="birth_month" name="birth_month" required>
            <label for="birth_month">月</label>
            
            <input type="text" id="birth_day" name="birth_day" required>
            <label for="birth_day">日</label>
        </div>
    </div>
    
    <br>

    <!-- 性別 -->
    <div>
        <label>性別</label>
        <input type="radio" id="sex-male" name="sex" value="男" required>
        <label for="sex-male">男</label>
        <input type="radio" id="sex-female" name="sex" value="女" required>
        <label for="sex-female">女</label>
    </div>
    <br>

    <!-- 家族構成の選択 -->
    <label>家族構成:</label>
    <input type="radio" name="family-structure" value="あり" required onclick="redirectToKazokuKousei()">
    <label for="family-yes">あり</label>
    <input type="radio" name="family-structure" value="なし" required>
    <label for="family-no">なし</label>

    <br>
    <button type="button" name="henkou" class="change-button">変更</button>

</body>
</html>


