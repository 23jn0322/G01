<?php 
require_once './helpers/MemberDAO.php';
$MemberDAO = new MemberDAO();
if(session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user;
// セッションの情報がある場合に表示する
if (isset($_SESSION['Member'])) {
    $user = $_SESSION['Member']; // セッションからログインしたユーザーの情報を取得

    $memberAndFamily = $MemberDAO->getFamily($user->MID);
} else {
    // セッションに情報がない場合はリダイレクトなどを検討
    header('Location: login.php');
    //exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //var_dump($_POST['sakujyo_FID']);
    if(isset($_POST['sakujyo_FID'])){
        //famiyさくじょ($_POST['FID'])
        $MemberDAO->deleteFamily($_POST['sakujyo_FID']);
        $memberAndFamily = $MemberDAO->getFamily($user->MID);
    }
    // フォームデータを取得
    $MID = $_POST['user_id'] ?? '';  // ユーザID
    $Name = $_POST['name'] ?? '';  // 名前
    $Password = $_POST['password'] ?? '';  // パスワード
    $Password2 = $_POST['re-password'] ?? '';  // パスワード再入力
    $DOB = $_POST['birth_year'] . '-' . $_POST['birth_month'] . '-' . $_POST['birth_day'];  // 生年月日
    $Sex = $_POST['sex'] ?? '';  // 性別

    // 家族構成の追加処理
    //if (isset($_POST['family']) && $_POST['family'] === 'あり') {
        $familyMembers = [];
        //for ($i = 1; $i <= 1; $i++) {
            if (!empty($_POST["birth_year1"])) {
                $family = [
                    'DOB' => $_POST["birth_year1"] . '-' . $_POST["birth_month1"] . '-' . $_POST["birth_day1"],
                    'Sex' => ($_POST["sex1"] === '男') ? 1 : 0
                ];
                $familyMembers[] = $family;
            }
        //}
        //var_dump($user->MID);
        // 家族メンバーの情報を追加
        var_dump($MemberDAO->addFamily($user->MID, $familyMembers));
    //}
    // メンバー情報をセッションに保存
    //$_SESSION['Member'] = $MemberDAO->get_member($MID,  $Password);

    // セッションの中身を確認
    //var_dump($_SESSION['Member']);  // ここで、name が正しく格納されているか確認

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

   
    </div>
    <br>
    <label>家族構成:</label>
    <!-- 生年月日 -->
    <div class="birth-henko" id="birthdate-henko">
        <!-- 会員の情報を表示 -->
        <label for="birth_year">生年月日</label>
        <div class="date-inputs">
            <!-- 生年月日の各部分（年、月、日）をセッションから取得して表示 -->
            <input type="text" readonly id="birth_year" name="birth_year" value="<?php echo htmlspecialchars(explode('-', $memberAndFamily[0]['DOB'])[0] ?? ''); ?>" >
            <label for="birth_year">年</label>
                    
            <input type="text" readonly id="birth_month" name="birth_month" value="<?php echo htmlspecialchars(explode('-',  $memberAndFamily[0]['DOB'])[1] ?? ''); ?>" >
            <label for="birth_month">月</label>
                    
            <input type="text" readonly id="birth_day" name="birth_day" value="<?php echo htmlspecialchars(explode('-',  $memberAndFamily[0]['DOB'])[2] ?? ''); ?>" required>
            <label for="birth_day">日</label>
        
            </div>
        </div>
            
        <br>
        
        <!-- 性別 -->
        <div>
                <label>性別</label>
                <?php
                    if($memberAndFamily[0]["Sex"] == 1){
                ?>
                    <label for="sex-male">男</label>
                <?php
                    }else {
                ?>                
                        <label for="sex-female">女</label>
                <?php } ?>

            </div>     
            <br>
            <br>
            <br>
    <?php
        foreach($memberAndFamily as $family){
            //var_dump($family);
    ?>
            <!-- 家族の情報を表示 -->
            <!-- 生年月日 -->
            <button type="submit" name="sakujyo_FID" onClick="location.href='./kaiinhenkou.php'" method="POST" value="<?php echo htmlspecialchars($family['FID']) ?>" class="change-button">削除</button>
            <div class="birth-henko" id="birthdate-henko">
                <label for="birth_year">生年月日</label>
                <div class="date-inputs">
                    <!-- 生年月日の各部分（年、月、日）をセッションから取得して表示 -->
                    <input type="text" readonly id="birth_year" name="birth_year" value="<?php echo htmlspecialchars(explode('-', $family['Age'])[0] ?? ''); ?>" >
                    <label for="birth_year">年</label>
                    
                    <input type="text" readonly id="birth_month" name="birth_month" value="<?php echo htmlspecialchars(explode('-',  $family['Age'])[1] ?? ''); ?>" >
                    <label for="birth_month">月</label>
                    
                    <input type="text" readonly id="birth_day" name="birth_day" value="<?php echo htmlspecialchars(explode('-',  $family['Age'])[2] ?? ''); ?>" required>
                    <label for="birth_day">日</label>
        
                </div>
            </div>
            
            <br>
        
            <!-- 性別 -->
            <div>
                <label>性別</label>
                <?php
                    if($family["Sex"] == 1){
                ?>
                    <label for="sex-male">男</label>
                <?php
                    }else {
                ?>                
                        <label for="sex-female">女</label>
                <?php } ?>
                
            </div>        
    <?php
        }
    ?>
    

    <br>
    <div id="family-group" class="form-group" style="display: ;">
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
                <button type="submit" name="henkou" class="change-button">追加</button>
            </div>

        
   
    </div>
 
</form>

</body>
</html>
