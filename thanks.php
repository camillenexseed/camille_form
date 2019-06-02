<?php
    // サンクスページ
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        header('Location: index.html');
    }
    // if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    //     header('Location: index.html');
    // }

    // 関数の呼び出し
    require_once('function.php');

    $nickname = h($_POST['nickname']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);

    //DBとの接続
    require_once('dbconnect.php');
    $stmt = $dbh->prepare('INSERT INTO surveys (nickname, email, content) VALUES (?, ?, ?)');
    $stmt->execute([$nickname, $email, $content]);//?を変数に置き換えてSQLを実行

  require_once('includes/header.php');
?>
<div class="container mt-5">
  <h1 class="mb-3">お問い合わせありがとうございました！</h1>
    <p><?php echo $nickname ?></p>
    <p><?php echo $email ?></p>
    <p><?php echo $content ?></p>
  </body>
</html>