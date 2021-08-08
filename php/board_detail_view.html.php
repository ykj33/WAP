<?php
include 'db_connect.php';
$board_id = $_GET["board_id"];
// 목록 데이터 조회
try {
    $sql = "SELECT * FROM rikarsong.board WHERE board_id = :board_id AND delete_yn = 'N'";
    $stmh = $pdo->prepare($sql);
    $stmh->bindValue(':board_id', $board_id, PDO::PARAM_STR);
    $stmh->execute();
    $count = $stmh->rowCount();
} catch (Exception $exception) {
    print "오류: " . $exception->getMessage();
}
?>