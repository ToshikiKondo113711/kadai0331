<?php
session_start();
include("funcs.php");
loginCheck();

$user_id = $_GET['user_id'];

//1.  DB接続します (funcs.php)でdb_connect関数を作成してる
$pdo = db_connect();

//.SELECT * FROM register_func WHERE $user_id=:user_id;
$sql = "SELECT * FROM register_func WHERE user_id=:user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id',$user_id,PDO::PARAM_INT);
$status = $stmt->execute();

//.データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //データのみの抽出のため、ループはさせない
 $row = $stmt->fetch();

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>プロフィール</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="u_select.php">ユーザ 一覧</a></div>
    <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>

    
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->


  <div class="jumbotron">
   <fieldset>
    <legend>プロフィール</legend>
    <form method="post" action="u_update.php">
    <input type="hidden" name="user_id" value="<?=$row["user_id"]?>">
     <label>ニックネーム：<input type="text" name="username" value="<?=$row["username"]?>"></label><br>
     <label>メールアドレス：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
     <label>パスワード：<input type="password" name="password" value="<?=$row["password"]?>"></label><br>
	   <label>性別：<input type="text" name="sex" value="<?=$row["sex"]?>"></label><br>
     <label>年齢：<input type="text" name="age" value="<?=$row["age"]?>"></label><br>
  	 <label>自己紹介：<textArea name="profile" rows="4" cols="40"><?=$row["profile"]?></textArea></label><br>
     <label>その他情報：<textArea name="other" rows="2" cols="20"><?=$row["other"]?></textArea></label><br>
     <input type="hidden" name="user_id" value="<?=$row["user_id"]?>">
     <input type="submit" value="更新">
     </form>
     
     <legend>文章を投稿</legend>
     <form method="post" action="msg_insert.php"> 
     　
     <label>ニックネーム：<input type="hidden" name="username" value="<?=$row["username"]?>"></label><br>
        <label>タイトル：<textArea name="title" rows="2" cols="20"></textArea></label><br>
        <label>本文：<textArea name="msg" rows="4" cols="40"></textArea></label><br>
        <input type="hidden" name="user_id" value="<?=$row["user_id"]?>">
        <input type="submit" value="投稿">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
    
</body>
</html>
