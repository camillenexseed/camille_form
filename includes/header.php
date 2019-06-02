<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ユーザー一覧</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">一覧</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="register.php">新規ユーザー登録</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php">
          <input class="form-control mr-sm-2" type="search" placeholder="ユーザー検索" aria-label="Search" name="nickname">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索</button>
        </form>
      </div>
    </nav>
  </header>