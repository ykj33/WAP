<?php
$db_user = "root";
$db_pass = "audwleogkrry";
$db_host = "localhost";
$db_name = "wap";
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
try {
    $sql = "SELECT identifier, title, register, regist_date FROM wap.record WHERE title = :title AND delete_yn = 'N'";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
    $stmh->execute();
    $count = $stmh->rowCount();
} catch (Exception $exception) {
    print "오류: " . $exception->getMessage();
}
