<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAP</title>

    <!-- css 리셋 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.1/reset.min.css">
    <!--    material-icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">

    <!--    jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script defer src="../js/main.js"></script>

    <!-- bootstrap include -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans KR', sans-serif;
            font-size: 20px;
        }

        footer {
            font-size: 14px;
        }

        a {
            text-decoration: none;
        }

        a:hover {
            text-decoration: none;
            font-size: 110%;
        }
    </style>
</head>

<body>
<header>
    <div class="logo-line">
        <div class="logo">
            <a href="../index.html">
                <img src="../image/rikar_logo.png" alt="로고" class="logo">
            </a>
        </div>
        <div class="application-name">
            원평동<br>
            도시재생기록화
        </div>
        <div class="login">
            <a href="#">
                <p>로그인</p>
            </a>
        </div>
    </div>
    <div class="menu-group">
        <div class="menu">
            <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                기록물 등록
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="../record_single_regist.html">기록물 단일 등록</a>
                <a class="dropdown-item" href="../record_multi_regist.html">기록물 다중 등록</a>
            </div>
        </div>
        <div class="menu">
            <a href="php/record_list_view.html.php">기록물 조회</a>
        </div>
        <div class="menu">
            <a href="#">모니터링단<br> 커뮤니티</a>
        </div>
    </div>
    <!-- menu 부분 -->
</header>
<div class="container">
    <div class="inner">
        <div class="list-inner">

            <?php
            // DB 연결 정보
            $db_user = "rikarsong";
            $db_pass = "rikar0217@@";
            $db_host = "localhost";
            $db_name = "rikarsong";
            $db_type = "mysql";
            $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";

            //            $db_user = "root";
            //            $db_pass = "audwleogkrry";
            //            $db_host = "localhost";
            //            $db_name = "wap";
            //            $db_type = "mysql";
            //            $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";


            try {
                // DB 연결
                $pdo = new PDO($dsn, $db_user, $db_pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//                    print "접속하였습니다.";
            } catch (Exception $exception) {
                die('오류:' . $exception->getMessage());
            }
            // 목록 데이터 조회
            try {
                $sql = "SELECT * FROM rikarsong.record WHERE delete_yn = 'N' ORDER BY regist_date DESC";
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
                $page_sql = "SELECT * FROM rikarsong.record WHERE delete_yn = 'N' ORDER BY regist_date DESC LIMIT $page_start, $list";
                $stmh = $pdo->prepare($page_sql);
                $stmh->execute();
            } catch (Exception $exception) {
                print "오류: " . $exception->getMessage();
            }
            ?>
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">식별자</th>
                    <th scope="col">제목</th>
                    <th scope="col">등록자</th>
                    <th scope="col">등록일</th>
                </tr>
                </thead>
                <tbody>
                <?php

                while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {

                    ?>
                    <tr>
                        <td align="center"><?= htmlspecialchars($row['identifier']) ?></td>
                        <td align="center"><a
                                    href="record_detail_view.html.php?record_id=<?= $row['record_id'] ?>"><?= htmlspecialchars($row['title']) ?>
                        </td>
                        <td align="center"><?= htmlspecialchars($row['register']) ?></td>
                        <td align="center"><?= htmlspecialchars($row['regist_date']) ?></td>
                    </tr>

                    <?php
                }
                ?>
                </tbody>
            </table>
<!--            페이지네이션 번호-->
            <div id="page_num" style="text-align: center">
                <?php
                if($page <= 1){
                } else {
                    echo "<a href=record_list_view.html.php?page=1'> 처음 </a>";
                }
                if($page <= 1){

                } else {
                    $pre = $page-1;
                    echo "<a href='record_list_view.html.php?$pre'> 이전 </a>";
                }
                for($i = $block_start; $i <= $block_end; $i++){
                    if($page == $i){
                        echo "<b> $i </b>";
                    } else {
                        echo "<a href='record_list_view.html.php?page=$i'> $i </a>";
                    }
                }
                if($page>= $total_page){

                } else {
                    $next = $page + 1;
                    echo "<a href='record_list_view.html.php?page=$next'> 다음 </a>";
                }
                if($page >= $total_page) {

                } else {
                    echo "<a href='recorcd_list_view.html.php?$page=$total_page'> 마지막 </a>";
                }
                ?>
            </div>
            <div class="search-group">
                <form class="form-inline my-2 my-lg-0" action="record_list_view_search.html.php" method="GET">
                    <div class="input-group mb-3">
                        <select class="custom-select" id="inputGroupSelect01" name="select_option[]">
                            <option selected>검색 카테고리</option>
                            <option value="title">제목</option>
                            <option value="register">작성자</option>
                        </select>
                        <input class="form-control mr-sm-2" type="search" placeholder="검색어 입력" aria-label="Search"
                               name="search_word" id="search_word">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">검색</button>
                    </div>


                </form>
            </div>

        </div>
    </div>
</div>
<footer>
    <div class="footer-description">
        <div class="mylogo">

        </div>
        <div class="description">
            | 기관명: OOOO
            <br>
            | 전화번호: 00-000-0000
            <br>
            |주소: (00000) OO시 OO동 OOOOOOOOOOOO
        </div>
        <div class="between">

        </div>
        <div class="description2">
            | 대표자: OOO
            <br>
            | E-mail: OOOO@OOOO.kr

        </div>
    </div>
</footer>
</body>
</html>