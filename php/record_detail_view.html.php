<!DOCTYPE html>
<? session_start();
print $_SESSION['team_name']; ?>
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
            <img src="../image/wp_title.png" alt="">
            <!-- <p>원평동<br>
                도시재생기록화</p> -->
        </div>
        <!--        <div class="login">-->
        <!--            <a href="../login.html"><img src="../image/login.png" alt=""></a>-->
        <!--        </div>-->
    </div>
    <div class="menu-group">
        <div class="menu">
            <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                <img src="../image/record_regist.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="record_single_regist.html.php">기록물 단일 등록</a>
                <a class="dropdown-item" href="record_multi_regist.html.php">기록물 다중 등록</a>
            </div>
        </div>
        <div class="menu">
            <a href="./record_list_view.html.php"><img src="../image/record_view.png" alt=""></a>
        </div>
        <!-- <div class="menu">
        <a href="#">모니터링단<br> 커뮤니티</a> -->
    </div>
    </div>
</header>

<!-- CONTENT -->
<div class="container">
    <div class="content">
        <div class="inner">
            <div class="regist-inner">


                <form method="POST" class="register" id="register_form"
                      name="register_form"
                      enctype="multipart/form-data">
                    <?php
                    // DB 연결 정보
                    $db_user = "rikarsong";
                    $db_pass = "rikar0217@@";
                    $db_host = "rikarsong.cafe24.com";
                    $db_name = "rikarsong";
                    $db_type = "mysql";
                    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
                    //                    $db_user = "root";
                    //                    $db_pass = "audwleogkrry";
                    //                    $db_host = "localhost";
                    //                    $db_name = "wap";
                    //                    $db_type = "mysql";
                    //                    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
                    try {
                        // DB 연결
                        $pdo = new PDO($dsn, $db_user, $db_pass);
                        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
//                    print "접속하였습니다.";
                    } catch (Exception $exception) {
                        die('오류:' . $exception->getMessage());
                    }
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
                    <?php
                    while ($row = $stmh->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <? print $_SESSION['team_name']; ?>
                    <div class="metadata-group">
                        <section class="image-section">
                            <img src="<?= htmlspecialchars($row['url']) ?>"
                                 alt="<?= htmlspecialchars($row['title']) . "이미지" ?>">
                        </section>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="title_label">제목(*)</span>
                            </div>
                            <input type="text" class="form-control" aria-label="제목"
                                   aria-describedby="title" name="title" id="title"
                                   value="<?= htmlspecialchars($row['title']) ?>" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="creator_label">생산자(*)</span>
                            </div>
                            <input type="text" class="form-control"
                                   aria-label="생산자" aria-describedby="creator" name="creator" id="creator"
                                   value="<?= htmlspecialchars($row['creator']) ?>" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="collector_label">수집자</span>
                            </div>
                            <input type="text" class="form-control"
                                   aria-label="수집자" aria-describedby="collector" name="collector" id="collector"
                                   value="<?= htmlspecialchars($row['collector']) ?>" disabled>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="date_from_label">시작날짜(*)</span>
                            </div>
                            <input type="date" class="form-control" aria-label="시작날짜"
                                   aria-describedby="date_from" name="date_from" id="date_from"
                                   value="<?= htmlspecialchars($row['date_from']) ?>" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="date_to_label">종료날짜(*)</span>
                            </div>
                            <input type="date" class="form-control" aria-label="종료날짜"
                                   aria-describedby="date_to" name="date_to" id="date_to"
                                   value="<?= htmlspecialchars($row['date_to']) ?>" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="extent_label">기록규모(*)</span>
                            </div>
                            <input type="text" class="form-control"
                                   aria-label="기록규모" aria-describedby="extent" name="extent" id="extent"
                                   value="<?= htmlspecialchars($row['extent']) ?>" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="medium_label">기록매체(*)</span>
                            </div>
                            <input type="text" class="form-control"

                                   aria-label="기록매체" aria-describedby="medium" name="medium" id="medium"
                                   value="<?= htmlspecialchars($row['medium']) ?>" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="scope_label">기록범위</span>
                            </div>
                            <input type="text" class="form-control"

                                   aria-describedby="scope" name="scope" id="scope"
                                   value="<?= htmlspecialchars($row['scope']) ?>" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="type_label">기록유형(*)</span>
                            </div>
                            <input type="text" class="form-control"

                                   aria-describedby="type" name="type" id="type"
                                   value="<?= htmlspecialchars($row['type']) ?>" disabled>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="record_description_label">기술</span>
                            </div>
                            <textarea class="form-control" aria-label="기술"
                                      aria-describedby="record_description" name="record_description"
                                      id="record_description"
                                      disabled><?= htmlspecialchars($row['description']) ?></textarea>
                        </div>
                        <!--                        <div class="input-group mb-3">-->
                        <!--                            <div class="input-group-prepend">-->
                        <!--                                <span class="input-group-text" id="upload_label">기록물 첨부</span>-->
                        <!--                            </div>-->
                        <!--                            <div class="custom-file">-->
                        <!--                                <input type="file" class="custom-file-input" name="uploadfile" id="uploadfile"-->
                        <!--                                       aria-describedby="upload" onchange="checkFile(this)">-->
                        <!--                                <label class="custom-file-label" id="custom-file-label" for="uploadfile"></label>-->
                        <!--                            </div>-->
                        <!---->
                        <!--                        </div>-->

                        <div class="button-group">
                            <?

                            if (!isset($_SESSION['user_id']) || !isset($_SESSION['password']) || !isset($_SESSION['team_name'])) {
                                print "정말 모르겠다.";
                            } else {
                                $user_id = $_SESSION['user_id'];
                                $password = $_SESSION['password'];
                                $team_name = $_SESSION['team_name'];
                                print "진짜 모르겠다.";
                                print '<a href="record_detail_view_update.html.php?record_id=' . $row['record_id'] . '>
                                    <button type="button" id="update" class="btn btn-secondary btn-lg">수정</button>
                                </a>
                                <a href="record_detail_view_delete.html.php?record_id=' . $row['record_id'] . '>
                                    <button type="button" id="delete" class="btn btn-secondary btn-lg">삭제</button>
                                </a>';
                            }
                            ?>

                            <a href="record_list_view.html.php">
                                <button type="button" id="list" class="btn btn-secondary btn-lg">목록</button>
                            </a>
                            <!--                            <a href="record_detail_view.html.php?record_id = -->
                            <? //=$row['record_id']-1 ?><!--"><button type="button" id="prev_button" class="btn btn-secondary btn-lg">이전글</button></a>-->
                            <!--                            <a href="record_detail_view.html.php?record_id = -->
                            <? //=$row['record_id'] + 1 ?><!--"><button type="button" id="next_button" class="btn btn-secondary btn-lg">다음글</button></a>-->
                        </div>
                    </div>
                </form>
                <?php
                }
                ?>
            </div>

        </div>
    </div>
</div>
</div>
<footer>

    <div class="footer-description">
        <div class="mylogo">
            <img src="../image/wp_logo.png">
            <img src="../image/OCS_logo2.png">
        </div>
        <div class="between">

        </div>
        <div class="description">
            | 담당자: 이지은
            <br>
            | 전화번호: 02-539-8734
            <br>
            | E-mail: iniii0819@ocsint.co.kr
        </div>
        <div class="between">

        </div>
        <div class="description2">
            | 오픈카톡방 들어오는 방법:
            <br> 카카오톡 우측상단에 있는 오픈채팅에서 <br>☆구미시 원평동 모니터링단☆을 검색해주세요!

        </div>
    </div>

</footer>
</body>

</html>