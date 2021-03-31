<?php
//XSS対応関数
function h($val){
  return htmlspecialchars($val,ENT_QUOTES);
}

//LOGIN認証がされているかチェックする関数
function loginCheck(){
    // セッションIDのチェック「ログインを行っているか確認」
    // セッションIDを取得しているか、または、取得したセッションIDが正しいかを比較している。
    if(
        !isset($_SESSION["chk_ssid"])||$_SESSION["chk_ssid"] != session_id()
    ){
        echo "LOGIN ERROR";
        exit();
    }else{
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
    
    // セッションIDが更新されているか確認
    echo $_SESSION["chk_ssid"];
    
    }
}

function db_connect(){
    try {
        $pdo = new PDO('mysql:dbname=kadai0331_db;charset=utf8;host=localhost','root','');
        } catch (PDOException $e) {
          exit('データベースに接続できませんでした。'.$e->getMessage());
        }
        return $pdo;
}



?>