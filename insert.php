<?php
//1. POSTデータ取得
$year = $_POST['year'];
$revenue = $_POST['revenue'];
$asset = $_POST['asset'];
$liab = $_POST['liab'];

//2. DB接続します
require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO 
gs_bm_table2(id, year,revenue,asset,liab,indate)
VALUES(NULL, :year, :revenue, :asset, :liab, sysdate())");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':year', $year,PDO::PARAM_STR);
$stmt->bindValue(':revenue', $revenue,PDO::PARAM_STR);
$stmt->bindValue(':asset', $asset,PDO::PARAM_STR);
$stmt->bindValue(':liab', $liab,PDO::PARAM_STR);
// $stmt->bindValue(':id'. $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    //*** function化する！*****************
    header('Location: index.php');
    exit();
}
