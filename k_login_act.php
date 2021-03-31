<?php
session_start();
include("funcs.php");
$email = $_POST["email"];
$password = $_POST["password"];

//1.  DB接続します xxxにDB名を入れます(funcs.php)でdb_connect関数を作成してる
$pdo = db_connect();

//２．データ表示SQL作成
$sql = "SELECT * FROM register_func WHERE email=:email AND password=:password ";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);
$res = $stmt->execute();

//SQL実行時にエラーがある場合
if($res==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}

//３．抽出データ数を取得
//$count = $stmt->fetchColumn(); //SELECT COUNT(*)で使用可能()
$val = $stmt->fetch(); //1レコードだけ取得する方法

//４. 該当レコードがあればSESSIONに値を代入かつ kanriカラムに1がある場合は管理者と判断
if( $val["user_id"] != "" AND $val["kanri"]!=0){
  $_SESSION["chk_ssid"]  = session_id();
  $_SESSION["username"]   = $val['username'];
  header("Location:select.php");    
}else{
  //Login処理NGの場合k_login.phpへ遷移

  header("Location: k_login.php");
}
//処理終了
exit();
?>