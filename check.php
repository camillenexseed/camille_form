<?php
    // 確認ページ
    //メソッドがGETの時はトップページにリダイレクト
    if($_SERVER['REQUEST_METHOD'] !== 'POST'){
        header('Location: register.php');
    }

    // 関数の呼び出し
    require_once('function.php');

    //スーパーグローバル関数
    $nickname = h($_POST['nickname']);
    $email = h($_POST['email']);
    $content = h($_POST['content']);
    // echo $nickname;

    //ニックネーム：値の有無で処理を分岐
    if ($nickname == '') {
        $nickname_result = 'ニックネームが入力されてません。';
    } else {
        $nickname_result = 'ようこそ、' . $nickname . '様';
    }

    //メールアドレス：値の有無で処理を分岐
    if ($email == '') {
        $email_result = 'メールアドレスが入力されてません。';
    } else {
        $email_result = 'メールアドレス:' . $email;
    }

    //お問い合わせ内容：値の有無で処理を分岐
    if ($content == '') {
        $content_result = 'お問い合わせ内容が入力されていません。';
    } else {
        $content_result = 'お問い合わせ内容:' . $content;
    }
    require_once('includes/header.php');
?>
<div class="container mt-5">
    <h1 class="mb-3">入力内容確認</h1>
    <p><?php echo $nickname_result ?></p>
    <p><?php echo $email_result ?></p>
    <p><?php echo $content_result ?></p>
    <form method="POST" action="thanks.php">
        <input type="hidden" name="nickname" value="<?php echo $nickname?>">
        <input type="hidden" name="email" value="<?php echo $email?>">
        <input type="hidden" name="content" value="<?php echo $content?>">

        <input type="button" value="戻る" onclick="history.back()" class="btn btn-dark">
        <?php if ($email != '' && $nickname != '' && $content != ''):
            //コロン構文
            ?>
            <input type="submit" value="この内容で送信する" class="btn btn-success">
        <?php endif;?>
    </form>
</div>
</body>
</html>




