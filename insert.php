<?php
//入力データの確認
if(
    !isset($_POST['username'])||$_POST['username']==''||
    !isset($_POST['email'])||$_POST['email']==''||
    !isset($_POST['password'])||$_POST['password']==''||
    !isset($_POST['sex'])||$_POST['sex']==''||
    !isset($_POST['age'])||$_POST['age']==''||
    !isset($_POST['profile'])||$_POST['profile']==''||
    !isset($_POST['other'])||$_POST['other']==''
)
{
    exit('ParamError');
}

//1. POSTデータ取得

//まず前のphpからデーターを受け取る（この受け取ったデータをもとにbindValueと結びつけるため）
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$sex = $_POST["sex"];
$age = $_POST["age"];
$profile = $_POST["profile"];
$other = $_POST["other"];

//2.  DB接続します xxxにDB名を入れます(funcs.php)でdb_connect関数を作成してる
include("funcs.php");
$pdo = db_connect();

//３．データ登録SQL作成 //ここにカラム名を入力する
//xxx_table(テーブル名)はテーブル名を入力します
$sql="INSERT INTO register_func(user_id, username, email,password,sex,age,profile,other,indate )VALUES(NULL, :username, :email, :password,:sex
,:age ,:profile,:other,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  
$stmt->bindValue(':password', $password, PDO::PARAM_STR);  
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR); 
$stmt->bindValue(':age', $age, PDO::PARAM_INT); 
$stmt->bindValue(':profile', $profile, PDO::PARAM_STR); 
$stmt->bindValue(':other', $other, PDO::PARAM_STR); 
$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: index.php");
    exit;
}
