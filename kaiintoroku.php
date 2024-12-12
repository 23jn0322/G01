<?php 
    require_once './helpers/MemberDAO.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $MID = $_POST['MID'];
        $Name = $_POST['Name'];
        $Password = $_POST['Password'];
        $Password2 = $_POST['Password2'];
        $DOB = $_POST['DOB'];
        $Sex = $_POST['Sex'];
        $Fami = $_POST['Fami'];
       
        if($Password === $Password2){

            $MemberDAO = new MemberDAO();

            $member = new Member();
            $member->MID = $MID; 
            $member->Name = $Name;
            $member->Password = $Password;
            $member->DOB = $DOB;
    
            $MemberDAO->insert($Member);
    
            header('Location:home.php');
            exit;
        }

        
    }

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>会員登録</title>
    <link rel="stylesheet" href="css/kaiintoroku.css"> <!-- 外部CSSファイルのリンク -->
    <style>
        /* ページ全体の高さを調整して、ボタンが下に表示されるように */
        body {
            display: flex;
            flex-direction: column;
            height: 100vh;
            margin: 0;
        }

        form {
            flex-grow: 1;
            overflow-y: auto;
        }

        /* 登録ボタンは常にページ下部に表示 */
        #toroku {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <form action="home.php" method="POST">
        <div>
            <p>会員登録</p>
        </div>

        <!-- ユーザID -->
        <div>
            <label for="user_id">ユーザID</label>
            <input type="text" id="user_id" name="user_id">
            <br><span class="info-message">ユーザーIDはログインにて利用するため変更できません。</span>
            <br><span class="info-message2">※8～16文字で入力してください。</span>
        </div>
        <br>

        <!-- パスワード -->
        <div>
            <label for="password">パスワード:</label>
            <input type="password" id="password" name="password">
            <br><span class="info-message2">※8～16文字で入力してください。</span>
        </div>
        <br>

        <!-- パスワード再入力 -->
        <div>
            <label for="re-password">パスワード再入力:</label>
            <input type="password" id="re-password" name="re-password">
            <br><span class="info-message2">※8～16文字で入力してください。</span>
        </div>
        <br>

        <!-- 生年月日 -->
        <div>
            <div class="birth-date" id="birthdate">
                <label for="birth_year">生年月日</label>
                <input type="text" id="birth_year" name="birth_year" pattern="^[1-9][0-9]{3}$" title="1900以上の4桁の数字を入力してください" required>
                <label for="birth_year">年</label>
                <input type="text" id="birth_month" name="birth_month" pattern="^(0[1-9]|1[0-2])$" title="01から12までの月を入力してください" required>
                <label for="birth_month">月</label>
                <input type="text" id="birth_day" name="birth_day" pattern="^(0[1-9]|[12][0-9]|3[01])$" title="01から31までの日を入力してください" required>
                <label for="birth_day">日</label>
            </div>
        </div>
        <br>

        <!-- 性別 -->
        <div>
            <label>性別</label>
            <br>
            <input type="radio" id="sex-male" name="sex" value="男" required>
            <label for="sex-male">男</label>
            <input type="radio" id="sex-female" name="sex" value="女" required>
            <label for="sex-female">女</label>
        </div>
        <br>

        <!-- 家族構成 -->
        <div>
            <label>家族構成</label>
            <br>
            <input type="radio" id="family-yes" name="family" value="あり" required>
            <label for="family-yes">あり</label>
            <input type="radio" id="family-no" name="family" value="なし" required>
            <label for="family-no">なし</label>
        </div>

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

            <label for="family-member-1">生年月日</label>
            <div class="date-inputs">
                <input type="number" id="birth_year5" name="birth_year5" min="1900">
                <label for="birth_year5">年</label>
                <input type="number" id="birth_month5" name="birth_month5" min="1" max="12">
                <label for="birth_month5">月</label>
                <input type="number" id="birth_day5" name="birth_day5" min="1" max="31">
                <label for="birth_day5">日</label>
            </div>

            <label>性別</label>
            <div class="date-inputs">
                <input type="radio" id="sex-male-5" name="sex5" value="男">
                <label for="sex-male-5">男</label>
                <input type="radio" id="sex-female-5" name="sex5" value="女">
                <label for="sex-female-5">女</label>
            </div>
        </div>

        <!-- 登録ボタン -->
        <input type="submit" value="登録">
    </form>

    <script>
        // 現在の年を取得
        const currentYear = new Date().getFullYear();

        // 年入力フィールドのmax属性を現在の年に設定
        document.getElementById('birth_year').setAttribute('max', currentYear);
        document.getElementById('birth_year1').setAttribute('max', currentYear);
        document.getElementById('birth_year2').setAttribute('max', currentYear);
        document.getElementById('birth_year3').setAttribute('max', currentYear);
        document.getElementById('birth_year4').setAttribute('max', currentYear);
        document.getElementById('birth_year5').setAttribute('max', currentYear);
    </script>

    <script>
        // 家族構成が「あり」の場合に家族の生年月日フィールドを表示
        document.querySelectorAll('input[name="family"]').forEach((radio) => {
            radio.addEventListener('change', function() {
                if (this.value === 'あり') { // "あり"が選択された場合
                    document.getElementById('family-group').style.display = 'block'; // 「家族情報」のform-groupを表示
                } else {
                    document.getElementById('family-group').style.display = 'none'; // 「家族情報」のform-groupを非表示
                }
            });
        });

        // 初期状態で「なし」が選択されているので、最初は非表示
        document.getElementById('family-group').style.display = 'none';
    </script>
</body>

</html>