<?php
// 個別データの更新ページ

require_once('function.php');
require_once('dbconnect.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // 値を取得する
    $id = h($_POST['id']);
    $nickname = h($_POST['nickname']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);

    $stmt = $dbh->prepare("UPDATE surveys SET nickname = ?, email = ?, content = ? WHERE id = $id");
    $stmt->execute([$nickname, $email, $content]);

    // トップページへリダイレクト
    header('Location: index.php');
}

//更新したいデータを探す
$result = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $dbh->prepare('SELECT * FROM surveys WHERE id=?');
    $stmt->execute(["$id"]);
    $result = $stmt->fetchAll();
    $result = $result[0];
}else{
    header('Location: index.php');
}

//ヘッダーのソースコード読み込み
require_once('includes/header.php');
?>
  <div class="container mt-5">
    <h1 class="mb-3">ユーザー情報更新</h1>
    <form method="POST" action="update.php">
      <div class="form-group">
        <label for="nickname">ニックネーム</label>
        <input type="text" name="nickname" id="nickname" class="form-control" value="<?php echo h($result['nickname'])?>">
      </div>
      <div class="form-group">
        <label for="email">メールアドレス</label>
        <input type="text" name="email" class="form-control" id="email" value="<?php echo h($result['email'])?>">
      </div>
      <div class="form-group">
        <label for="content">お問い合わせ</label>
        <textarea name="content" id="content" class="form-control"><?php echo h($result['content'])?></textarea>
      </div>
      <input type="hidden" value="<?php echo h($result['id'])?>" name="id">
      <input type="submit" value="更新する" class="btn btn-success">
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>



