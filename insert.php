<?php
//1. POSTデータ取得
// $id        = $_POST["id"];
$name      = $_POST["name"];
$email     = $_POST["email"];
$book_name = $_POST["book_name"];
$point     = $_POST["point"];
$comment   = $_POST["comment"];


//2. DB接続します
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();

// // try {
// //     $pdo = new PDO('mysql:dbname='.php_form.';charset=utf8;host='.$db_host, $db_id, $db_pw);
// //   } catch (PDOException $e) {
// //     exit('DB_CONECT:'.$e->getMessage());
// //   }


// //３．データ登録SQL作成
$sql = "INSERT INTO php_form(id,name,email,book_name,point,comment)VALUES(null,:name,:email,:book_name,:point,:comment)";
// $stmt = $pdo->prepare("INSERT INTO php_form(name,email,book_name,point,comment)VALUES(:name,:email,:book_name,:point,:comment)");
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':point', $point, PDO::PARAM_INT);
// $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':point', $point, PDO::PARAM_INT);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行
var_dump($name);

// $sql = "UPDATE php_form SET name=:name,email=:email,book_name=:book_name,point=:point,comment=:comment WHERE id=:id";
// $stmt = $pdo->prepare($sql);
// $stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':book_name', $book_name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':point', $point, PDO::PARAM_INT);
// $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
// $status = $stmt->execute(); //実行

// //４．データ登録処理後
// if($status==false){
// //     //*** function化する！*****************
//     $error = $stmt->errorInfo();
//     exit("SQL_ERROR:".$error[2]);
// sql_error($stmt);
// }else{
// //5．index.phpへリダイレクト
//  header("Location: index.php");
// // redirect("index.php");
//    exit();
// }
?>
