<?php
// 検索結果ページ

require_once('function.php');
require_once('dbconnect.php');

$nickname = '';
if (isset($_GET['nickname'])) {
    $nickname = $_GET['nickname'];
}

$stmt = $dbh->prepare('SELECT * FROM surveys WHERE nickname like ?');
$stmt->execute(["%$nickname%"]);
$results = $stmt->fetchAll();

require_once('includes/header.php');
?>
<div class="container mt-5">
  <p><?php echo $nickname ?>の検索結果</p>
  <?php foreach ($results as $result): ?>
    <div class="card mb-3">
      <div class="card-body">
        <h3 class="card-title"><?php echo h($result['nickname']) ?></h3>
      <p><?php echo h($result['email']) ?></p>
      <p><?php echo h($result['content']) ?></p>
      </div>
    </div>
  <?php endforeach;?>
</div>
</body>
</html>