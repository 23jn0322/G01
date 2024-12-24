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
            <input type="text" id="ingredient-name" name="mei" class="input-box" placeholder="">
        
            <label for="category">中ジャンル</label>
            <select id="category" class="dropdown">
                <option value="">選択してください</option>
                <option value="leafvegetable">葉物野菜</option>
                <option value="mushroom">キノコ類</option>
                <option value="rootvegetable">根菜類</option>
                <option value="other">その他</option>
            </select>

<div class="checkbox-container">
    <label for="usual">
        <input type="checkbox" id="usual"> いつもの
    </label>
</div>
</div>

    <div class="container"></div>
        <label for="ingredient-name" class="label">購入単位</label>
        <input type="text" id="ingredient-name" class="input-box" placeholder="">
        <select id="category" class="dropdown">
            <option value="">選択してください</option>
            <option value="ball">玉</option>
            <option value="piece">個</option>
            <option value="bottole">本</option>
            <option value="bandle">束</option>
            <option value="can">缶</option>
            <option value="kg">kg</option>
            <option value="g">g</option>
        </select>
    </div>

    <div class="container"></div>
    <label for="ingredient-name" class="label">たんぱく質</label>
    <input type="text" id="ingredient-name" class="input-box" placeholder="">
    <select id="category" class="dropdown">
        <option value="">選択してください</option>
        <option value="mushroom">g</option>
        <option value="rootvegetable">mg</option>
        <option value="other">㎍</option>
    </select>
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">食物繊維</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="">
<select id="category" class="dropdown">
    <option value="">選択してください</option>
    <option value="mushroom">g</option>
    <option value="rootvegetable">mg</option>
    <option value="other">㎍</option>
</select>
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">炭水化物</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="">
<select id="category" class="dropdown">
    <option value="">選択してください</option>
    <option value="gram">g</option>
    <option value="mgram">mg</option>
    <option value="microgram">㎍</option>
</select>
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">ビタミンD</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="">
<select id="category" class="dropdown">
    <option value="">選択してください</option>
    <option value="gram">g</option>
    <option value="mgram">mg</option>
    <option value="microgram">㎍</option>
</select>
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">ビタミンC</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="">
<select id="category" class="dropdown">
    <option value="">選択してください</option>
    <option value="gram">g</option>
    <option value="mgram">mg</option>
    <option value="microgram">㎍</option>
</select>
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">ビタミンA</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="">
<select id="category" class="dropdown">
    <option value="">選択してください</option>
    <option value="gram">g</option>
    <option value="mgram">mg</option>
    <option value="microgram">㎍</option>
</select>
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">カルシウム</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="">
<select id="category" class="dropdown">
    <option value="">選択してください</option>
    <option value="gram">g</option>
    <option value="mgram">mg</option>
    <option value="microgram">㎍</option>
</select>
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">鉄</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="">
<select id="category" class="dropdown">
    <option value="">選択してください</option>
    <option value="gram">g</option>
    <option value="mgram">mg</option>
    <option value="microgram">㎍</option>
</select>
</div>

<div class="container"></div>
<label for="ingredient-name" class="label">亜鉛</label>
<input type="text" id="ingredient-name" class="input-box" placeholder="">
<select id="category" class="dropdown">
    <option value="">選択してください</option>
    <option value="gram">g</option>
    <option value="mgram">mg</option>
    <option value="microgram">㎍</option>
</select>
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
