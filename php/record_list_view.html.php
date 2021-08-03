<?php
include 'db_connect.php';
// 목록 데이터 조회
try {
    $sql = "SELECT * FROM rikarsong.record WHERE delete_yn = 'N' ORDER BY record_id DESC";
    $stmh = $pdo->prepare($sql);
    $stmh->execute();
    $count = $stmh->rowCount();
    if (isset($_GET["page"])) {
        $page = $_GET["page"];

    } else {
        $page = 1;
    }
    $total_record = $count;
    $list = 15;
    $block_cnt = 5;
    $block_num = ceil($page / $block_cnt);
    $block_start = (($block_num - 1) * $block_cnt) + 1;
    $block_end = $block_start + $block_cnt - 1;
    $total_page = ceil(($total_record / $list));
    if ($block_end > $total_page) {
        $block_end = $total_page;
    }
    $total_block = ceil($total_page / $block_cnt);
    $page_start = ($page - 1) * $list;
    $page_sql = "SELECT * FROM rikarsong.record WHERE delete_yn = 'N' ORDER BY record_id DESC LIMIT $page_start, $list";
    $stmh = $pdo->prepare($page_sql);
    $stmh->execute();
} catch (Exception $exception) {
    print "오류: " . $exception->getMessage();
}
?>