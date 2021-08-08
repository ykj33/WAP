<?php
include 'db_connect.php';
// 목록 데이터 조회
try {
    $sql = "SELECT * FROM rikarsong.board WHERE delete_yn = 'N' AND notice_yn = 'Y' ORDER BY board_id DESC LIMIT 3";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
} catch (Exception $exception) {
    print "오류: " . $exception->getMessage();
}
?>