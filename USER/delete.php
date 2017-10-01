<?php
//1.  id取得
$id = $_GET["id"];

//2.  DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db50;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}

//3．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_user_table WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//エラーチェックとエラーがなければselect.phpへ
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
    
  header("Location: select.php");
  exit;
}













?>