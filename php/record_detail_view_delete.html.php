<?php
// DB 연결 정보
include 'db_connect.php';
try {
    $pdo->beginTransaction();
    $sql = "UPDATE rikarsong.record SET delete_yn = 'Y' WHERE record_id = :record_id";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':record_id', $_GET['record_id'], PDO::PARAM_STR);
    $stmh->execute();
    $pdo->commit();
    echo "<script>window.location.replace('../record_list_view.html')</script>";
} catch (Exception $exception) {
    $pdo->rollBack();
    print "오류: " . $exception->getMessage();
}