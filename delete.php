<?php
//1.GETでidを取得
$user_id = $_GET["user_id"];

//2.DB接続
include("funcs.php");
$pdo = db_connect();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
$sql = 'DELETE FROM register_func WHERE user_id = :user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT); 
$status = $stmt->execute();


if($status==false){
 
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト
  header("Location: select.php");
  exit;

}



?>