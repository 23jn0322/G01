<?php
require_once './helpers/MemberDAO.php';

//POSTメソッドでリクエストされたとき    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 入力された会員データを受け取る
    $name = $_POST['name'] ?? null;
    $birth_year = $_POST['birth_year'] ?? null;
    $birth_month = $_POST['birth_month'] ?? null;
    $birth_day = $_POST['birth_day'] ?? null;
    $sex = $_POST['sex'] ?? null;
    $family_structure = $_POST['family-structure'] ?? null;

    // 入力があるかどうかチェック
    if ($name) {
        echo "名前は: " . $name . "<br>";
    } else {
        echo "名前が入力されていません。<br>";
    }

    if ($birth_year && $birth_month && $birth_day) {
        echo "誕生日: " . $birth_year . "年 " . $birth_month . "月 " . $birth_day . "日";
    } else {
        echo "誕生日情報が不足しています。<br>";
    }

    if ($sex) {
        echo "選択された性別は: " . $sex . "<br>";
    } else {
        echo "性別が選択されていません。<br>";
    }

    if ($family_structure) {
        echo "選択された家族構成は: " . $family_structure . "<br>";
    } else {
        echo "家族構成が選択されていません。<br>";
    }

    // 外部APIリクエスト処理
    $num = $_GET['num'] ?? ''; // numの値をGETで受け取る
    $url = "https://zipcloud.ibsnet.co.jp/api/search?birth_year=" . $birth_year; // 例: 年で検索
    // 他のパラメータ（誕生日の月日など）も適切にURLに追加
    if ($birth_month) {
        $url .= "&birth_month=" . $birth_month;
    }
    if ($birth_day) {
        $url .= "&birth_day=" . $birth_day;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_PROXY, "http://proxy00.jec.ac.jp:8080/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);
    $json = json_decode($data);
    curl_close($ch);

    // エラーが無ければDBに会員データを追加
    if (empty($errs)) {
        // 入力値のバリデーション
        $member = new Member();
        $member->name = $name;
        $member->birth_year = $birth_year;
        $member->birth_month = $birth_month;
        $member->birth_day = $birth_day;

        // DBに会員データを登録する MemberDAOクラスのinsert()メソッド呼び出し
        $memberDAO = new MemberDAO();
        $memberDAO->insert($member);

        // 登録完了ページsignupEnd.phpへ遷移
        header("Location: home.php"); // リダイレクトの修正
        exit;
    }
}
?>

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
        <label for="name">名前:</label>
        <input type="text" id="name" name="name" required>
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
    <button type="submit" name="henkou" class="change-button">変更</button>

</body>
</html>


