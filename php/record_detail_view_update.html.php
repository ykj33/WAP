<?php
// DB 연결 정보
include 'db_connect.php';
$record_id = $_GET["record_id"];
// 목록 데이터 조회
try {
$sql = "SELECT * FROM rikarsong.record WHERE record_id = :record_id AND delete_yn = 'N'";
$stmh = $pdo->prepare($sql);
$stmh->bindValue(':record_id', $record_id, PDO::PARAM_STR);
$stmh->execute();
$count = $stmh->rowCount();
} catch (Exception $exception) {
print "오류: " . $exception->getMessage();
}
?>