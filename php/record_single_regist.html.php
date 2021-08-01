<!DOCTYPE html>
<?php session_start();?>
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
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
             <!-- <div class="login">
                 <a href="login.html"><img src="image/login.png" alt=""></a>
             </div> -->
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
                <a href="record_list_view.html.php"><img src="../image/record_view.png" alt=""></a>
            </div>
            <!-- <div class="menu">
                <a href="#">모니터링단<br> 커뮤니티</a> -->
        </div>
        </div>
        <!-- <div class="container-fluid">
    <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">검색</button>
    </form>
</div> -->
        </div>

        <!-- menu 부분 -->
    </header>

    <!-- CONTENT -->
    <div class="container">
        <div class="content">
            <div class="inner">
                <div class="regist-inner">
                    <form action="record_regist.html.php" method="POST" class="register" id="register_form"
                          name="register_form" enctype="multipart/form-data">
                        <div class="metadata-group">
                            <div class="form-check">
                                <span>
                                    단일등록
                                </span>
                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1"
                                       value="M" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                    모니터링단
                                </label>
                                <input class="form-check-input2" type="radio" name="exampleRadios" id="exampleRadios2"
                                       value="A">
                                <label class="form-check-label2" for="exampleRadios2">
                                    아카이빙단
                                </label>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="upload_label">기록물 첨부</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="uploadfile[]" id="uploadfile"
                                        aria-describedby="upload" onchange="checkFileSingle(this)">
                                    <label class="custom-file-label" id="custom-file-label" for="uploadfile"></label>
                                </div>

                            </div>
                            <div class="upload-board">
                                <div class="button-group">
                                    <button type="button" class="uploadfile-del" onclick="deleteFile()">삭제</button>
                                </div>
                                <div class="thumb-box">

                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="title_label">제목(*)</span>
                                </div>
                                <input type="text" class="form-control" aria-label="제목" aria-describedby="title"
                                    name="title" id="title">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="creator_label">생산자(*)</span>
                                </div>
                                <input type="text" class="form-control" aria-label="생산자" aria-describedby="creator"
                                    name="creator" id="creator">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="collector_label">수집자</span>
                                </div>
                                <input type="text" class="form-control" aria-label="수집자" aria-describedby="collector"
                                    name="collector" id="collector">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="register_label">등록자(*)</span>
                                </div>
                                <select class="custom-select" id="register" name="register">
                                    <option value="마이구미" selected>마이구미</option>
                                    <option value="천지창조">천지창조</option>
                                    <option value="오아시스">오아시스</option>
                                    <option value="자만추">자만추</option>
                                </select>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="date_from_label">시작날짜(*)</span>
                                </div>
                                <input type="date" class="form-control" aria-label="시작날짜" aria-describedby="date_from"
                                    name="date_from" id="date_from">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="date_to_label">종료날짜(*)</span>
                                </div>
                                <input type="date" class="form-control" aria-label="종료날짜" aria-describedby="date_to"
                                    name="date_to" id="date_to">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="extent_label">기록규모(*)</span>
                                </div>
                                <input type="text" class="form-control" aria-label="기록규모" aria-describedby="extent"
                                    name="extent" id="extent">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="medium_label">기록매체(*)</span>
                                </div>
                                <input type="text" class="form-control" aria-label="기록매체" aria-describedby="medium"
                                    name="medium" id="medium">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="scope_label">기록범위</span>
                                </div>
                                <input type="text" class="form-control" aria-describedby="scope" name="scope"
                                    id="scope">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="type_label">기록유형(*)</span>
                                </div>
                                <input type="text" class="form-control" aria-describedby="type" name="type" id="type">
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="record_description_label">기술</span>
                                </div>
                                <textarea class="form-control" aria-label="기술" aria-describedby="record_description"
                                    name="record_description" id=record_description></textarea>
                            </div>

                            <div class="button-group">
                                <button type="submit" id="confirm" class="btn btn-secondary btn-lg">등록</button>
                                <button type="button" id="cancel" class="btn btn-secondary btn-lg">취소</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <footer>
        <!-- <div class="footer-logo-group">
        <div class="footer-logo">
            <a href="https://www.gb.go.kr/Main/index.html"><img src="image/gb_mark.png"
                    alt="경북도청 로고"><span>경북도청</span></a>
        </div>
        <div class="footer-logo">
            <a href="https://www.gumi.go.kr/main.do"><img src="image/gumi_logo2.png"
                    alt="구미시청 로고"><span>구미시청</span></a>

        </div>
        <div class="footer-logo">
            <a href="https://blog.naver.com/gumi-urc"><img src="image/wp_logo.png"
                    alt="구미시 도시재생지원센터 로고"><span>구미도시재생지원센터</span></a>

        </div>
        <div class="footer-logo">
            <a href="https://www.instagram.com/gumi_urc/"><img src="image/instagram.png"
                    alt="구미시 원평동 현장지원센터 SNS 로고"><span>instagram</span></a>
        </div>
    </div> -->
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