<?php 
  require_once './helpers/SyokutouDAO.php';
  require_once './helpers/MemberDAO.php';

if(session_status() === PHP_SESSION_NONE){
  session_start();
}

  $Member = $_SESSION['Member'];

  $SyokutouDAO = new SyokutouDAO();
  $rireki_list = $SyokutouDAO->get_syokutou_by_MID($Member->MID);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>買い物登録画面</title>
  <link rel="stylesheet" href="css/rirekitoroku.css">
</head>
<body>
<div class="title">履歴から買い物登録</div>
    <div class="container">
        <div class="content">
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: 牛肉" value="牛肉">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: ほうれん草" value="ほうれん草">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: にんじん" value="にんじん">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: 大根" value="大根">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
            <div class="item-row">
                <input type="text" class="item-input" placeholder="例: りんご" value="りんご">
                <div class="row">
                    <input type="number" value="100" class="quantity-input">
                    <select>
                        <option value="g">g</option>
                        <option value="kg">kg</option>
                        <option value="本">本</option>
                        <option value="玉">玉</option>
                        <option value="個">個</option>
                        <option value="束">束</option>
                        <option value="袋">袋</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <!-- フッター部分 -->
    <div class="footer">
      <a href="home.php" class="small-button">冷蔵庫in</a>
    </div>
  </div>
</body>
</html>
