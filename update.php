<?php

//PHP:コード記述/修正の流れ
//1. insert.phpの処理をマルっとコピー。
//2. $id = $_POST["id"]を追加
//3. SQL修正
//   "UPDATE テーブル名 SET 変更したいカラムを並べる WHERE 条件"
//   bindValueにも「id」の項目を追加
//4. header関数"Location"を「select.php」に変更

//1. POSTデータ取得
$year   = $_POST['year'];
$revenue  = $_POST['revenue'];
$asset  = $_POST['asset'];
$liab    = $_POST['liab'];
// hiddenで追加したidも加える
$id = $_POST['id'];

require_once('funcs.php');
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare('UPDATE gs_bm_table2 SET year = :year, revenue = :revenue, asset = :asset, liab = :liab, indate = sysdate() WHERE id = :id;');


// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':year', $year, PDO::PARAM_INT);
$stmt->bindValue(':revenue', $revenue, PDO::PARAM_INT);
$stmt->bindValue(':asset', $asset, PDO::PARAM_INT); 
$stmt->bindValue(':liab', $liab, PDO::PARAM_INT);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status === false) {
    //*** function化する！******\
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    header('Location: select.php');
    exit();
}