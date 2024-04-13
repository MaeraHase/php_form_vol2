<!-- 1回目の課題で使ったphpファイル。2回目はselect.phpへ接続 -->

<!-- データ表示 -->
<!-- <!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ表示</title>
  <style>
   table,td,th {
     border: 1px solid #000;
     padding: 5px;
     text-align: center;
    }
  </style>
</head>
<body>
 <form name="myForm" method="post" action="study_database_edit.html">
   <select id="code_selection" name="code">
   <option value="1">テーブル作成</option>
   <option value="2">テーブル一覧</option>
   <option value="3">テーブル削除</option>
   </select>
   <p><label>テーブル名</label><input type="text" name="name" placeholder="hogehoge" pattern="^[0-9A-Za-z]+$"></p>
   <p><input type="submit" value="実行"></p>
   </form> -->

    <?php
    // 1.DBへ接続
    
     try{
        $pdo = new PDO('mysql:dbname=php_form;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
        exit('DB_CONECT:'.$e->getMessage());
      }
      
    // 2.データ登録SQL作成
    $sql = "SELECT * FROM php_form";
    $stmt = $pdo->prepare($sql);
    $status = $stmt->execute();

    // 3.データ表示
    // $view=""; 無視する
    if($status==false){
    // execute(SQL実行時にエラーがある場合)
    $erroe = $stmt->   errorInfo(); 
    exit("SQL_ERROR:".$error[2]);
    }

    // 全データ取得
    $values = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    
    <!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>おすすめしたい本</title>
<link rel="stylesheet" href="form.css">
<link href="form.css" rel="stylesheet">
<style>
div{padding: 10px;font-size:16px;}
td{border: 1px solid black;}
</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->


<!-- Main[Start] -->
<div>
    <div class="container jumbotron">
    <table>
    <?php foreach($values as $value){ ?>
        <tr>
        <td><?=$value["name"]?></td>
        <td><?=$value["email"]?></td>
        <td><?=$value["book_name"]?></td>
        <td><?=$value["point"]?></td>
        <td><?=$value["comment"]?></td>
        </tr>
    <?php }?>
    </table>
    </div>
</div>
<!-- Main[End] -->


<script>
  //JSON受け取り



</script>
</body>
</html>