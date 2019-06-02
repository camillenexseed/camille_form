<?php
// 検索結果ページ
$title = '検索結果';

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
  <h1 class="mb-3"><?php echo $title ?></h1>
  <p><?php echo $nickname ?>の検索</p>
  <?php if (count($results) === 0): ?>
    <p>該当するニックネームはいません。</p>
  <?php else: ?>
    <?php foreach ($results as $result): ?>
      <div class="card mb-3">
        <div class="card-body">
          <h3 class="card-title"><?php echo h($result['nickname']) ?></h3>
        <p><?php echo h($result['email']) ?></p>
        <p><?php echo h($result['content']) ?></p>
        </div>
      </div>
    <?php endforeach;?>
  <?php endif ?>
  <p class="mt-5">
    <a href="index.php" class="btn btn-primary btn-block">ユーザー一覧へ戻る</a>
  </p>
</div>
</body>
</html>