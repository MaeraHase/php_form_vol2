<?php
//1. POSTデータ取得
$name      = $_POST["name"];
$email     = $_POST["email"];
$book_name = $_POST["book_name"];
$point     = $_POST["point"];
$comment   = $_POST["comment"];


//2. DB接続します
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO php_form(name,email,book_name,point,comment)VALUES(:name,:book_name,:point,:comment)");
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':point', $point, PDO::PARAM_INT);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
//     //*** function化する！*****************
//     $error = $stmt->errorInfo();
//     exit("SQLError:".$error[2]);
// }else{
//     //*** function化する！*****************
//     header("Location: index.php");
//     exit();
}
?>
