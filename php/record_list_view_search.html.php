<?php
//                 DB 연결 정보
include "db_connect.php";

if (isset($_GET["select_option"])) {
    foreach ($_GET["select_option"] as $select_option) {

        $search_word = '%' . $_GET["search_word"] . '%';

        if ($select_option == "title") {
// 목록 데이터 조회
            try {
                $sql = "SELECT * FROM rikarsong.record WHERE title like :title AND delete_yn = 'N' ORDER BY regist_date DESC";
                $stmh = $pdo->prepare($sql);
                $stmh->bindValue(':title', $search_word, PDO::PARAM_STR);
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
                $page_sql = "SELECT * FROM rikarsong.record WHERE title like :title AND delete_yn = 'N' ORDER BY regist_date DESC LIMIT $page_start, $list";
                $stmh = $pdo->prepare($page_sql);
                $stmh->bindValue(':title', $search_word, PDO::PARAM_STR);
                $stmh->execute();
            } catch (Exception $exception) {
                print "오류: " . $exception->getMessage();
            }
        } elseif ($select_option == "register") {
            try {
                $search_word = '%' . $_GET["search_word"] . '%';
                $sql = "SELECT * FROM rikarsong.record WHERE register like :register AND delete_yn = 'N' ORDER BY regist_date DESC";
                $stmh = $pdo->prepare($sql);
                $stmh->bindValue(':register', $search_word, PDO::PARAM_STR);
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
                $page_sql = "SELECT * FROM rikarsong.record WHERE register like :register AND delete_yn = 'N' ORDER BY regist_date DESC LIMIT $page_start, $list";
                $stmh = $pdo->prepare($page_sql);
                $stmh->bindValue(':register', $search_word, PDO::PARAM_STR);
                $stmh->execute();
            } catch (Exception $exception) {
                print "오류: " . $exception->getMessage();
            }
        }
    }
}