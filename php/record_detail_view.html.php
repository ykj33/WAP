<!DOCTYPE html>
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
            <a href="http://rikarsong.cafe24.com/wap/index.html">
                <img src="../image/gumi_logo.png" alt="로고" class="logo">
            </a>
            <div class="login">
                <a href="#">
                    <p>로그인</p>
                </a>
            </div>
        </div>
        <div class="container-fluid">
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">검색</button>
            </form>
        </div>
    </div>
    <!-- <div class="banner">
    배너 들어갈 곳
</div> -->

    <!-- menu 부분 -->
    <div class="menu-group">
        <div class="menu">
            <a href="../record_regist.html">기록물 등록</a>
        </div>
        <div class="menu">
            <a href="#">기록물 조회</a>
        </div>
        <div class="menu">
            <a href="#">게시판</a>
        </div>
    </div>
</header>

<!-- CONTENT -->
<div class="container">
    <div class="content">
        <div class="inner">
            <div class="regist-inner">


                <form  method="POST" class="register" id="register_form"
                      name="register_form"
                      enctype="multipart/form-data">
                    <?php
                    // DB 연결 정보
                    //                        $db_user = "rikarsong";
                    //                        $db_pass = "rikar0217@@";
                    //                        $db_host = "localhost";
                    //                        $db_name = "rikarsong";
                    //                        $db_type = "mysql";
                    //                        $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
                    $db_user = "root";
                    $db_pass = "audwleogkrry";
                    $db_host = "localhost";
                    $db_name = "wap";
                    $db_type = "mysql";
                    $dsn = "$db_type:host=$db_host;dbname=$db_name;charset=utf8";
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
                        $sql = "SELECT * FROM wap.record WHERE record_id = :record_id AND delete_yn = 'N'";
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

                    <div class="metadata-group">
                        <section class="image-section">
                            <img src="<?= htmlspecialchars($row['url'])?>" alt="<?= htmlspecialchars($row['title'])."이미지" ?>">
                            <?php
                            echo $row['url']
                            ?>
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
                                      id=record_description value="<?= htmlspecialchars($row['description']) ?>" disabled></textarea>
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
                        <?php
                        }
                        ?>
                        <div class="button-group">
                            <a href="record_list_view.html.php"><button type="button" id="update" class="btn btn-secondary btn-lg">수정</button></a>
                            <a href="record_list_view.html.php"><button type="button" id="delete" class="btn btn-secondary btn-lg">삭제</button></a>
                            <a href="record_list_view.html.php"><button type="button" id="list" class="btn btn-secondary btn-lg">목록</button></a>
<!--                            <a href="record_detail_view.html.php?record_id = --><?//=$row['record_id']-1 ?><!--"><button type="button" id="prev_button" class="btn btn-secondary btn-lg">이전글</button></a>-->
<!--                            <a href="record_detail_view.html.php?record_id = --><?//=$row['record_id'] + 1 ?><!--"><button type="button" id="next_button" class="btn btn-secondary btn-lg">다음글</button></a>-->
                        </div>
                    </div>
                </form>
            </div>
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
                try {
                    $sql = "SELECT * FROM wap.record WHERE delete_yn = 'N'";
                    $stmh = $pdo->prepare($sql);
                    $stmh->execute();
                    $count = $stmh->rowCount();
                } catch (Exception $exception) {
                    print "오류: " . $exception->getMessage();
                }
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
        </div>
    </div>
</div>
</div>
<footer>
    <div class="footer-logo-group">
        <div class="footer-logo">
            <a href="https://www.gb.go.kr/Main/index.html"><img src="../image/gb_mark.png"
                                                                alt="경북도청 로고"><span>경북도청</span></a>
        </div>
        <div class="footer-logo">
            <a href="https://www.gumi.go.kr/main.do"><img src="../image/gumi_logo2.png"
                                                          alt="구미시청 로고"><span>구미시청</span></a>

        </div>
        <div class="footer-logo">
            <a href="https://blog.naver.com/gumi-urc"><img src="../image/wp_logo.png"
                                                           alt="구미시 도시재생지원센터 로고"><span>구미도시재생지원센터</span></a>

        </div>
        <div class="footer-logo">
            <a href="https://www.instagram.com/gumi_urc/"><img src="../image/instagram.png"
                                                               alt="구미시 원평동 현장지원센터 SNS 로고"><span>instagram</span></a>
        </div>
    </div>
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
        <div class="description2">
            | 대표자: OOO
            <br>
            | E-mail: OOOO@OOOO.kr

        </div>
    </div>

</footer>
</body>

</html>