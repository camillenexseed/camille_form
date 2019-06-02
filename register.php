<?php
    // ユーザー登録ページ
    require_once('includes/header.php');
?>
<div class="container mt-5">
  <h1 class="mb-3">お問い合わせ情報入力</h1>
  <form method="POST" action="check.php">
    <div class="form-group">
      <label for="nickname">ニックネーム</label>
      <input type="text" name="nickname" id="nickname" class="form-control" >
    </div>
    <div class="form-group">
      <label for="email">メールアドレス</label>
      <input type="text" name="email" class="form-control" id="email">
    </div>
    <div class="form-group">
      <label for="content">お問い合わせ</label>
      <textarea name="content" id="content" class="form-control"></textarea>
    </div>
    <input type="submit" value="確認する" class="btn btn-success">
  </form>
</div>
</body>
</html>