<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>家族構成の変更</title>
    <link rel="stylesheet" href="css/kazokukousei.css">
    
    
</head>
<body>
    <form action="#" method="POST">
        <div class="form-title">家族構成の変更</div>



         <!-- 家族メンバーの入力 -->
         <div class="form-group">
            
                <label for="family-member-1">生年月日</label>
                <div class="date-inputs">
                    <input type="text" id="birth_year1" name="birth_year1" required>
                    <label for="birth_year1">年</label>
                    
                    <input type="text" id="birth_month1" name="birth_month1" required>
                    <label for="birth_month1">月</label>
                    
                    <input type="text" id="birth_day1" name="birth_day1" required>
                    <label for="birth_day1">日</label>
                </div>
                <div>
                    <label>性別</label>
                    <div class="date-inputs">
                    <input type="radio" id="sex-male" name="sex" value="男" required>
                    <label for="sex-male">男</label>
                    <input type="radio" id="sex-female" name="sex" value="女" required>
                    <label for="sex-female">女</label>
                </div>

                <div class="form-group">
                    <label for="family-member-2">生年月日</label>
                    <div class="date-inputs">
                        <input type="text" id="birth_year2" name="birth_year2" required>
                        <label for="birth_year2">年</label>
                        
                        <input type="text" id="birth_month2" name="birth_month2" required>
                        <label for="birth_month2">月</label>
                        
                        <input type="text" id="birth_day2" name="birth_day2" required>
                        <label for="birth_day2">日</label>
                    </div>

                    <div>
                        <label>性別</label>
                        <div class="date-inputs">
                        <input type="radio" id="sex-male" name="sex" value="男" required>
                        <label for="sex-male">男</label>
                        <input type="radio" id="sex-female" name="sex" value="女" required>
                        <label for="sex-female">女</label>
                    </div>

                    <div class="form-group">
                        <label for="family-member-3">生年月日</label>
                        <div class="date-inputs">
                            <input type="text" id="birth_year3" name="birth_year3" required>
                            <label for="birth_year3">年</label>
                            
                            <input type="text" id="birth_month3" name="birth_month3" required>
                            <label for="birth_month3">月</label>
                            
                            <input type="text" id="birth_day3" name="birth_day3" required>
                            <label for="birth_day3">日</label>
                        </div>

                        <div>
                            <label>性別</label>
                            <div class="date-inputs">
                            <input type="radio" id="sex-male" name="sex" value="男" required>
                            <label for="sex-male">男</label>
                            <input type="radio" id="sex-female" name="sex" value="女" required>
                            <label for="sex-female">女</label>
                        </div>

                        <div class="form-group">
                            <label for="family-member-4">生年月日</label>
                            <div class="date-inputs">
                                <input type="text" id="birth_year4" name="birth_year4" required>
                                <label for="birth_year4">年</label>
                                
                                <input type="text" id="birth_month4" name="birth_month4" required>
                                <label for="birth_month4">月</label>
                                
                                <input type="text" id="birth_day4" name="birth_day4" required>
                                <label for="birth_day4">日</label>
                            </div>

                            <div>
                                <label>性別</label>
                                <div class="date-inputs">
                                <input type="radio" id="sex-male" name="sex" value="男" required>
                                <label for="sex-male">男</label>
                                <input type="radio" id="sex-female" name="sex" value="女" required>
                                <label for="sex-female">女</label>
                            </div>

                            <div class="form-group">
                                <label for="family-member-5">生年月日</label>
                                <div class="date-inputs">
                                    <input type="text" id="birth_year5" name="birth_year5" required>
                                    <label for="birth_year5">年</label>
                                    
                                    <input type="text" id="birth_month5" name="birth_month5" required>
                                    <label for="birth_month">月</label>
                                    
                                    <input type="text" id="birth_day5" name="birth_day5" required>
                                    <label for="birth_day5">日</label>
                                </div>
    
                                <div>
                                    <label>性別</label>
                                    <div class="date-inputs">
                                    <input type="radio" id="sex-male" name="sex" value="男" required>
                                    <label for="sex-male">男</label>
                                    <input type="radio" id="sex-female" name="sex" value="女" required>
                                    <label for="sex-female">女</label>
                                </div>

            </div>
        </div>
        <!-- Repeat for other family members -->
    </div>
    

    <br>
    <button type="button" onclick="window.location.href='kaiinhenkou.php'">戻る</button>

    <button type="submit" name="change">変更</button>

</form>

<script>
    // 家族構成に応じて、生年月日入力欄を表示/非表示
    function toggleFamilyFields() {
        const familyStructure = document.querySelector('input[name="family-structure"]:checked');
        const familyFieldsContainer = document.getElementById('family-fields-container');
        
        // "あり"が選択された場合は生年月日入力欄を表示
        if (familyStructure && familyStructure.value === 'あり') {
            familyFieldsContainer.style.display = 'block';
        } else {
            familyFieldsContainer.style.display = 'none';
        }
    }

</script>

