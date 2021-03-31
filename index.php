<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ユーザ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<!-- ここからinsert.phpにデータを送ります --> 
<form method="post" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    <legend>掲示板</legend>
     <label>ニックネーム：<input type="text" name="username"></label><br>
     <label>メールアドレス：<input type="text" name="email"></label><br>
     <label>パスワード：<input type="password" name="password"></label><br>
	 <label>性別：<input type="text" name="sex"></label><br>
	 <label>年齢：<input type="text" name="age"></label><br>
	 <label>自己紹介：<textArea name="profile" rows="4" cols="40"></textArea></label><br>
     <label>その他情報：<textArea name="other" rows="2" cols="20"></textArea></label><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
