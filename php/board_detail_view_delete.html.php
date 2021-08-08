<?php
// DB 연결 정보
include "db_connect.php";
try {
    $pdo->beginTransaction();
    $sql = "UPDATE rikarsong.board SET delete_yn = 'Y' WHERE board_id = :board_id";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':board_id', $_GET['board_id'], PDO::PARAM_STR);
    $stmh->execute();
    $pdo->commit();
    echo "<script>window.location.replace('../board_list_view.html')</script>";
} catch (Exception $exception) {
    $pdo->rollBack();
    print "오류: " . $exception->getMessage();
}