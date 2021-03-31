<?php
//1.POSTでフォームの項目を取得
$user_id  = $_POST["user_id"];
$username = $_POST["username"];
$email    = $_POST["email"];
$password = $_POST["password"];
$sex      = $_POST["sex"];
$age      = $_POST["age"];
$profile  = $_POST["profile"];
$other    = $_POST["other"];


//2.DB接続します xxxにDB名を入れます(funcs.php)でdb_connect関数を作成してる
include("funcs.php");
$pdo = db_connect();

//3.UPDATE gs_an_table SET ....; で更新(bindValue)
$sql = 'UPDATE register_func SET username=:username, email=:email, password=:password, sex=:sex, age=:age, profile=:profile, other=:other WHERE user_id=:user_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  
$stmt->bindValue(':password', $password, PDO::PARAM_STR);  
$stmt->bindValue(':sex', $sex, PDO::PARAM_STR); 
$stmt->bindValue(':age', $age, PDO::PARAM_INT); 
$stmt->bindValue(':profile', $profile, PDO::PARAM_STR); 
$stmt->bindValue(':other', $other, PDO::PARAM_STR); 
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_INT);  //更新したいidを渡す
$status = $stmt->execute();


//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);

}else{
  //select.phpへリダイレクト

    // エラー表示を有効にする
    ini_set( 'display_errors', 1 );
    
    // 全てのエラーを表示する
    ini_set('error_reporting', E_ALL);


   header("Location:select.php");
    


  

}

exit;

?>