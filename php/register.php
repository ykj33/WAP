<?php

// DB 연결 정보
$db_host = "localhost";
$db_name = "wap";
$db_type = "mysql";
$db_user = "root";
$db_pass = "audwleogkrry";
$dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

try {
    $pdo = new PDO($dsn, $db_user, $db_pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    print "접속하였습니다.";
} catch (Exception $exception) {
    die('오류:' . $exception->getMessage());
}

try {
    $sql = "SELECT MAX(record_id) FROM wap.record";
    $stmh = $pdo->prepare($sql);
    $biggest_record_id = $stmh->execute();
    $record_id = $biggest_record_id + 1;
    $identifier = "WP_" . $record_id;

    // 트랜잭션 시작
    $pdo->beginTransaction();
    $sql = "INSERT INTO wap.record (identifier, record_id, title, creator, collector, date_from, date_to, extent, medium, scope, type, description, url)
            VALUES (:identifier, :record_id, :title, :creator, :collector, :date_from, :date_to, :extent, :medium, :scope, :type, :description, :url)";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':identifier', $identifier, PDO::PARAM_STR);
    $stmh->bindValue(':record_id', $record_id, PDO::PARAM_STR);
    $stmh->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
    $stmh->bindValue(':creator', $_POST['creator'], PDO::PARAM_STR);
    $stmh->bindValue(':collector', $_POST['collector'], PDO::PARAM_STR);
    $stmh->bindValue(':date_from', $_POST['date_from'], PDO::PARAM_STR);
    $stmh->bindValue(':date_to', $_POST['date_to'], PDO::PARAM_STR);
    $stmh->bindValue(':extent', $_POST['extent'], PDO::PARAM_STR);
    $stmh->bindValue(':medium', $_POST['medium'], PDO::PARAM_STR);
    $stmh->bindValue(':scope', $_POST['scope'], PDO::PARAM_STR);
    $stmh->bindValue(':type', $_POST['type'], PDO::PARAM_STR);
    $stmh->bindValue(':description', $_POST['record_description'], PDO::PARAM_STR);
    $stmh->bindValue(':url', $_POST['url'], PDO::PARAM_STR);
    $stmh->execute();
    $pdo->commit();
} catch (Exception $exception) {
    $pdo->rollBack();
    print "오류: " . $exception->getMessage();
}
