<?php
$id = $_GET["id"];
//１．PHP
//select.phpのPHPコードをマルっとコピーしてきます。
//※SQLとデータ取得の箇所を修正します。
include("funcs.php");
$pdo = db_conn();
try {
  $db_name = "php_form";     //データベース名
  $db_id   = "root";      //アカウント名
  $db_pw   = "";          //パスワード：XAMPPはパスワード無しに修正してください。
  $db_host = "localhost"; //DBホスト
  $pdo = new PDO('mysql:=php_form'.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
} catch (PDOException $e) {
  exit('DB Connection Error:'.$e->getMessage());
}

//２．データ登録SQL作成
$sql = "SELECT * FROM php_form WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
    sql_error($stmt);
//   $error = $stmt->errorInfo();
//   exit("SQLError:".$error[2]);
}

//データ取得
$v = $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
// $json = json_encode($values,JSON_UNESCAPED_UNICODE);
?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!-- データ入力 -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link rel="stylesheet" href="form.css">
  <!-- <style>div{padding: 10px;font-size:18px;}</style> -->
</head>
<body>
<!-- 最低のライン→データ登録：名前、Email、聞きたい問いを複数。登録されたデータを表で表示。 -->
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend class="form_title">おすすめしたい本データ更新</legend>
     <label>名前：<input type="text" name="name" value="<?=$v["name"]?>"></label><br>
     <label>Email：<input type="text" name="email" value="<?=$v["email"]?>"></label><br>
     <label>読んだ本の名前：<input type="text" name="book_name" value="<?=$v["book_name"]?>"></label><br>
     <label>おすすめ度：<input type="text" name="point" value="<?=$v["point"]?>"></label><br>
     <label>一言コメント：<textArea name="comment" rows="4" cols="40"><?=$v["comment"]?></textArea></label><br>
     <input type="hidden" name="id" value="<?=$v["id"]?>">
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>

<!-- ↓サイトなどから引っ張ってきた内容 -->

<!-- ↓入力内容を確認画面から戻った際にも表示させておく処理 -->
<?php
  session_start();
  $mode = "input";
  if( isset($_POST["back"] ) && $_POST["back"] ){
    // 何もしない
  } else if( isset($_POST["confirm"] ) && $_POST["confirm"] ){
    $_SESSION["name"] = $_POST["name"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["book_name"] = $_POST["book_name"];
    $_SESSION["point"] = $_POST["point"];
    $_SESSION["comment"] = $_POST["comment"];
    $mode = "confirm";
  } else if( isset($_POST["send"] ) && $_POST["send"] ){
    $mode = "send";
  } else {
    $SESSION = array();
  }
?>


<!-- Main[End] -->


</body>
</html>


