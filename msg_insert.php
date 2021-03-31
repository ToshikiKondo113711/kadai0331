<?php
//入力データの確認
if(
    !isset($_POST['user_id'])||$_POST['user_id']==''||
    !isset($_POST['username'])||$_POST['username']==''||
    !isset($_POST['title'])||$_POST['title']==''||
    !isset($_POST['msg'])||$_POST['msg']==''
)
{
    exit('ParamError');
}

//1. POSTデータ取得
$user_id = $_POST["user_id"];
$username = $_POST["username"];
$title = $_POST["title"];
$msg = $_POST["msg"];

//2.  DB接続します xxxにDB名を入れます(funcs.php)でdb_connect関数を作成してる
include("funcs.php");
$pdo = db_connect();

//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$sql="INSERT INTO msg_table(user_id,username, title, msg, indate)VALUES(:user_id,:username, :title, :msg,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);  
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  
$stmt->bindValue(':msg', $msg, PDO::PARAM_STR);  
$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: u_select.php");
    exit;
}
