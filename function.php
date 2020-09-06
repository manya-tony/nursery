<?php
// ==========================================
// データベース接続関数
// ==========================================

// PDOオブジェクトの生成
function dbConnect(){
    $dsn = 'mysql:dbname=chikichiki-tony_nursery;host=mysql57.chikichiki-tony.sakura.ne.jp;charset=utf8';
    $user = 'chikichiki-tony';
    $password = 'asuna0706';
    $dbh = new PDO($dsn, $user, $password);
    $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $dbh;   
}
