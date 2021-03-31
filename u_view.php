<?php

$user_id = $_GET["user_id"];

//DB接続
include("funcs.php");
$pdo = db_connect();

//.SELECT * FROM register_func WHERE $user_id=:user_id;
$sql = "SELECT * FROM register_func WHERE user_id=:user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id',$user_id,PDO::PARAM_INT);
$status = $stmt->execute();

//.データ表示

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
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザ 一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<form method="post" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>掲示板</legend>
    
     <label>ニックネーム：<input type="text" name="username" value="<?=$row["username"]?>"></label><br>
     <label>メールアドレス：<input type="text" name="email" value="<?=$row["email"]?>"></label><br>
     <label>パスワード：<input type="password" name="password" value="<?=$row["password"]?>"></label><br>
	   <label>性別：<input type="text" name="sex" value="<?=$row["sex"]?>"></label><br>
     <label>年齢：<input type="text" name="age" value="<?=$row["age"]?>"></label><br>
  	 <label>自己紹介：<textArea name="profile" rows="4" cols="40"><?=$row["profile"]?></textArea></label><br>
     <label>その他情報：<textArea name="other" rows="2" cols="20"><?=$row["other"]?></textArea></label><br>
     <input type="hidden" name="user_id" value="<?=$row["user_id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
    
</body>
</html>