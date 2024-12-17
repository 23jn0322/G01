<?php 
  require_once './helpers/SyokutouDAO.php';
  require_once './helpers/MemberDAO.php';
  require_once './helpers/RirekiDAO.php';


  session_start();


  $RirekiDAO = new RirekiDAO();
  $rireki_list = $RirekiDAO->get_rireki_by_syokuID($syokutou->syokuID);
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
                <?php foreach($rireki_list as $MID) : ?>
                <input type="text" class="item-input" value="<?=$Foods->SyokuName?>">
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
    <?php endforeach?>
    <!-- フッター部分 -->
    <div class="footer">
      <a href="home.php" class="small-button">冷蔵庫in</a>
    </div>
  </div>
</body>
</html>
