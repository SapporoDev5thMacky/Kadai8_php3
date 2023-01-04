<?php


$id = $_GET['id'];

require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT * FROM gs_bm_table2 WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //insert.phpから、PARAM_INTなので注意
$status = $stmt->execute();

if ($status === false) {
  $error = $stmt->errorInfo();
  exit('SQLError:' . print_r($error, true));
} else {

$result = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">決算結果入力</a></div>
            </div>
        </nav>
    </header>

    <!-- method, action, 各inputのnameを確認してください。  -->


    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>詳細</legend>
                <label>年度：<input type="text" name="year" value="<?= $result['year']?>"></label><br>
                <label>収益：<input type="text" name="revenue" value="<?= $result['revenue']?>"></label><br>
                <label>総資産：<input type="text" name="asset" value="<?= $result['asset']?>"></label><br>
                <label>負債：<input type="text" name="liab" value="<?= $result['liab']?>"></label><br>
                <input type="hidden" name="id" value="<?= $result['id']?>">
                <input type="submit" value="修正">
            </fieldset>
        </div>
    </form>
</body>

</html>