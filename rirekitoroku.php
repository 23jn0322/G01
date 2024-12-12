<?php 
  require_once './helpers/RirekiDAO.php';
  require_once './helpers/MemberDAO.php';

  SESSION_start();

  if(!empty($SESSION['member'])){
    header('Location:Login.php');
    exit;
  }

  $member = $SESSION['member'];



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
      <div class="items">
        <div class="item-row">
          <input type="text" class="item-input" placeholder="例: 牛肉" value="牛肉">
        </div>
        <div class="item-row">
          <input type="text" class="item-input" placeholder="例: ほうれん草" value="ほうれん草">
        </div>
        <div class="item-row">
          <input type="text" class="item-input" placeholder="例: にんじん" value="にんじん">
        </div>
        <div class="item-row">
            <input type="text" class="item-input" placeholder="例: 大根" value="大根">
          </div>
        <div class="item-row">
            <input type="text" class="item-input" placeholder="例: りんご" value="りんご">
          </div>
      </div>
      <div class="quantities">
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
        <div class="row">
          <input type="number" value="2" class="quantity-input">
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
        <div class="row">
          <input type="number" value="1" class="quantity-input">
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
        <div class="row">
            <input type="number" value="1" class="quantity-input">
            <select>
              <option value="g">g</option>
            <option value="kg">kg</option>
            <option value="本">本</option>
            <option value="玉">玉</option>
            <option value="個">個</option>
            <option value="束">束</option>
            <option value="袋">袋</option>
            </select>
          </div>  <div class="row">
            <input type="number" value="3" class="quantity-input">
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
    <!-- フッター部分 -->
    <div class="footer">
      <a href="home.php" class="small-button">冷蔵庫in</a>
    </div>
  </div>
</body>
</html>
