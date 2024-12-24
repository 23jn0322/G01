<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者食材詳細画面</title>
    <link rel="stylesheet" href="css/kanrisyosai.css">
</head>
<body>
        <!-- 戻るボタン -->
      <!-- 戻るボタン -->
<button onclick="window.location.href='kanri.php'" class="back-button">← 戻る</button>

        <h1>食材詳細</h1>
    
        <div class="input-section">
            <label for="ingredient-name">名称</label>
            <input type="text" id="ingredient-name" name="mei" class="input-box" placeholder="" value="にんじん">
        
            <label for="category">中ジャンル</label>
            <input type="text" id="ingredient-name" name="mei" class="input-box" placeholder="" value="根菜類">

<div class="checkbox-container">
    <label for="usual">
        <input type="checkbox" id="usual" checked="checked"> いつもの
    </label>
</div>
</div>

    <div class="container"></div>
        <label for="ingredient-name" class="label">購入単位</label>
        <input type="text" id="ingredient-name" class="input-box" placeholder="" value="本">
    </div>

    <div class="container"></div>
    <label for="ingredient-name" class="label">たんぱく質</label>
    <input type="text" id="ingredient-name" class="input-box" placeholder="" value="0.015">
    <input type="text" id="ingredient-name" class="input-box" placeholder="" value="g">
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">食物繊維</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="0.045">
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="g">
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">炭水化物</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="0.140">
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="g">
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">ビタミンD</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="0">
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="μg">
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">ビタミンC</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="0.120">
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="mg">
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">ビタミンA</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="12.500">
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="μg">
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">カルシウム</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="0.400">
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="mg">
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">鉄</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="0.009">
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="mg">
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">亜鉛</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="0.003">
<input type="text" id="ingredient-name" class="input-box" placeholder="" value="mg">
</div>


<div class="submit-container">

    <button class="submit-button" onclick="confirmRegistration()">登録</button>
</div>

<script>
    function confirmRegistration() {
        // 入力内容を取得
        const ingredientName = document.getElementById("ingredient-name").value;
        const category = document.getElementById("category").value;
        const usual = document.getElementById("usual").checked ? "はい" : "いいえ";
        
        // 確認メッセージを作成
        const message = `以下の内容で登録しますか？\n\n名称: ${ingredientName}\n中ジャンル: ${category}\nいつもの: ${usual}`;

        // 確認ダイアログを表示
        const userConfirmed = window.confirm(message);

        if (userConfirmed) {
            // ユーザーがOKを押した場合、登録処理を実行（ここでは単にログに出力するだけ）
            alert("登録が完了しました！");
            window.location.href = 'kanri.php';
        } else {
            // ユーザーがキャンセルを押した場合
            alert("登録をキャンセルしました。");
        }
    }
</script>

</body>
</html>
