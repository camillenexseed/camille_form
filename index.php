<?php
// http://localhost/php_contact_form/list.php

require_once('function.php');
require_once('dbconnect.php');

//削除ボタン
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $stmt = $dbh->prepare('DELETE FROM surveys WHERE id=?');
    $stmt->execute([$id]);
}
//一覧出力
$stmt = $dbh->prepare('SELECT * FROM surveys');
$stmt->execute();
$results = $stmt->fetchAll();

require_once('includes/header.php');
?>
  <div class="container mt-5">
    <h1 class="mb-3">ユーザー一覧</h1>
    <?php foreach ($results as $result): ?>
      <div class="card mb-3">
        <div class="card-body">
          <h3 class="card-title"><?php echo h($result['nickname']) ?></h3>
          <p><?php echo h($result['email']) ?></p>
          <p><?php echo h($result['content']) ?></p>
          <form action="index.php" method="post">
            <input type="hidden" name="id" value="<?php echo h($result['id']) ?>">
            <button type="submit" class="btn btn-danger">削除</button>
            <a href="update.php?id=<?php echo h($result['id'])?>" class="btn btn-success">更新</a>
          </form>
        </div>
      </div>
    <?php endforeach;?>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>



