<?php
// DB 연결 정보
$db_user = "rikarsong";
$db_pass = "rikar0217@@";
//            $db_host = "localhost";
$db_host = "rikarsong.cafe24.com";
$db_name = "rikarsong";

$db_type = "mysql";
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try {
    // DB 연결
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//                    print "접속하였습니다.";
} catch (Exception $exception) {
    die('오류:' . $exception->getMessage());
}
?>