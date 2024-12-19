<?php 
require_once './helpers/MemberDAO.php';
$MemberDAO = new MemberDAO();
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

// セッションの情報がある場合に表示する
if (isset($_SESSION['Member'])) {
    $user = $_SESSION['Member']; // セッションからログインしたユーザーの情報を取得

    $memberAndFamily = $MemberDAO->getFamily($user->MID);
} else {
    // セッションに情報がない場合はリダイレクトなどを検討
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // フォームデータを取得
    $MID = $_POST['user_id'] ?? '';  // ユーザID
    $Name = $_POST['name'] ?? '';  // 名前
    $Password = $_POST['password'] ?? '';  // パスワード
    $Password2 = $_POST['re-password'] ?? '';  // パスワード再入力
    $DOB = $_POST['birth_year'] . '-' . $_POST['birth_month'] . '-' . $_POST['birth_day'];  // 生年月日
    $Sex = $_POST['sex'] ?? '';  // 性別

    // 家族構成の追加処理
    if (isset($_POST['family']) && $_POST['family'] === 'あり') {
        $familyMembers = [];
        for ($i = 1; $i <= 5; $i++) {
            if (!empty($_POST["birth_year$i"])) {
                $family = [
                    'DOB' => $_POST["birth_year$i"] . '-' . $_POST["birth_month$i"] . '-' . $_POST["birth_day$i"],
                    'Sex' => ($_POST["sex$i"] === '男') ? 1 : 0
                ];
                $familyMembers[] = $family;
            }
        }

        // 家族メンバーの情報を追加
        $MemberDAO->addFamily($MID, $familyMembers);
    }
    // メンバー情報をセッションに保存
    $_SESSION['Member'] = $MemberDAO->get_member($MID,  $Password);

    // セッションの中身を確認
    var_dump($_SESSION['Member']);  // ここで、name が正しく格納されているか確認

    ob_flush();
    header('Location: home.php');  
    exit; 
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
</head>
<body>
<header>
    <?php include "header.php" ?>
</header>

<form action="" method="POST">
    <div>
        <label for="name">名前:</label>
        <!-- 既存の名前をデフォルト値として表示 -->
        <input type="text" readonly id="name" name="name" value="<?php echo htmlspecialchars($memberAndFamily[0]['Name']); ?>" >
    </div>
    <br>

   
    
  
    <label>家族構成:</label>
    <?php
    foreach($memberAndFamily as $family) {
    ?>

            <!-- 生年月日 -->
            <div class="birth-henko" id="birthdate-henko">
                <label for="birth_year">生年月日</label>
                <div class="date-inputs">
                    <!-- 生年月日の各部分（年、月、日）をセッションから取得して表示 -->
                    <input type="text" readonly id="birth_year" name="birth_year" value="<?php echo htmlspecialchars(explode('-', $family['DOB'])[0] ?? ''); ?>" >
                    <label for="birth_year">年</label>
                    
                    <input type="text" readonly id="birth_month" name="birth_month" value="<?php echo htmlspecialchars(explode('-',  $family['DOB'])[1] ?? ''); ?>" >
                    <label for="birth_month">月</label>
                    
                    <input type="text" readonly id="birth_day" name="birth_day" value="<?php echo htmlspecialchars(explode('-',  $family['DOB'])[2] ?? ''); ?>" required>
                    <label for="birth_day">日</label>
        
                </div>
            </div>
        
            <br>
        
            <!-- 性別 -->
            <div>
                <label>性別</label>
                <?php
                    if($family['Sex'] == 1) {
                ?>
                    <label for="sex-male">男</label>
                <?php
                    } else {
                ?>                
                        <label for="sex-female">女</label>
                <?php 
                } 
                ?>
            </div>                

    <?php
        }
    ?>
    
    <!-- 家族構成の選択 

    <input type="radio" name="family-structure" value="あり" required>
    <label for="family-yes">あり</label>
    <input type="radio" name="family-structure" value="なし" required>
    <label for="family-no">なし</label>-->
    <!-- 家族メンバーの入力 -->
        <div id="family-group" class="form-group" style="display: none;">
            <label for="family-member-1">生年月日</label>
            <div class="date-inputs">
                <input type="number" id="birth_year1" name="birth_year1" min="1900">
                <label for="birth_year1">年</label>
                <input type="number" id="birth_month1" name="birth_month1" min="1" max="12">
                <label for="birth_month1">月</label>
                <input type="number" id="birth_day1" name="birth_day1" min="1" max="31">
                <label for="birth_day1">日</label>
            </div>
            <label>性別</label>
            <div class="date-inputs">
                <input type="radio" id="sex-male-1" name="sex1" value="男">
                <label for="sex-male-1">男</label>
                <input type="radio" id="sex-female-1" name="sex1" value="女">
                <label for="sex-female-1">女</label>
            </div>

            <label for="family-member-2">生年月日</label>
            <div class="date-inputs">
                <input type="number" id="birth_year2" name="birth_year2" min="1900">
                <label for="birth_year2">年</label>
                <input type="number" id="birth_month2" name="birth_month2" min="1" max="12">
                <label for="birth_month2">月</label>
                <input type="number" id="birth_day2" name="birth_day2" min="1" max="31">
                <label for="birth_day2">日</label>
            </div>
            <label>性別</label>
            <div class="date-inputs">
                <input type="radio" id="sex-male-2" name="sex2" value="男">
                <label for="sex-male-2">男</label>
                <input type="radio" id="sex-female-2" name="sex2" value="女">
                <label for="sex-female-2">女</label>
            </div>

            <label for="family-member-3">生年月日</label>
            <div class="date-inputs">
                <input type="number" id="birth_year3" name="birth_year3" min="1900">
                <label for="birth_year3">年</label>
                <input type="number" id="birth_month3" name="birth_month3" min="1" max="12">
                <label for="birth_month3">月</label>
                <input type="number" id="birth_day3" name="birth_day3" min="1" max="31">
                <label for="birth_day3">日</label>
            </div>

            <label>性別</label>
            <div class="date-inputs">
                <input type="radio" id="sex-male-3" name="sex3" value="男">
                <label for="sex-male-3">男</label>
                <input type="radio" id="sex-female-3" name="sex3" value="女">
                <label for="sex-female-3">女</label>
            </div>

            <label for="family-member-4">生年月日</label>
            <div class="date-inputs">
                <input type="number" id="birth_year4" name="birth_year4" min="1900">
                <label for="birth_year4">年</label>
                <input type="number" id="birth_month4" name="birth_month4" min="1" max="12">
                <label for="birth_month4">月</label>
                <input type="number" id="birth_day4" name="birth_day4" min="1" max="31">
                <label for="birth_day4">日</label>
            </div>

            <label>性別</label>
            <div class="date-inputs">
                <input type="radio" id="sex-male-4" name="sex4" value="男">
                <label for="sex-male-4">男</label>
                <input type="radio" id="sex-female-4" name="sex4" value="女">
                <label for="sex-female-4">女</label>
            </div>
        </div>
    <br>
    <button type="submit" name="henkou" class="change-button">変更</button>

</form>

</body>
</html>