<?php
session_start();
include("funcs.php");
loginCheck();

//1.  DB接続します xxxにDB名を入れます(funcs.php)でdb_connect関数を作成してる
$pdo = db_connect();

//２．データ登録SQL作成
//作ったテーブル名を書く場所  xxxにテーブル名を入れます
$stmt = $pdo->prepare("SELECT * FROM register_func");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる例
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    // リンク作成
    $view .='<a href = "u_view.php?user_id='.$result["user_id"].'">';
    $view .="[更新]";
    $view .= '</a>';
    $view .= ' ';
    $view .='<a href = "delete.php?user_id='.$result["user_id"].'">';
    $view .="[削除]";
    $view .= '</a>';
    $view .= ' ';
    $view .= $result["username"]." - ".$result["email"]." - ".$result["password"]." - ".$result["sex"]." - ".$result["age"]." - ".$result["profile"]." - ".$result["other"]." - ".$result["indate"];
    $view .= "</p>";
   
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登録ユーザ一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">ユーザ登録</a>
      <a class="navbar-brand" href="logout.php">ログアウト</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] $view-->
<div>
 
    <div class="container jumbotron"><?=$view?></div>
  
    
</div>
<!-- Main[End] -->

</body>
</html>
