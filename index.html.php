<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAP</title>

    <!-- css 리셋 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.1/reset.min.css"/>
    <!--    material-icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="css/main.css">

    <!--    jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script defer src="js/main.js"></script>

    <!-- bootstrap include -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
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
            <a href="http://rikarsong.cafe24.com/wap/index.html.php">
                <img src="./image/rikar_logo.png" alt="로고" class="logo">
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

    <!-- menu 부분 -->
    <div class="menu-group">
        <div class="menu">
            <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                기록물 등록
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="record_single_regist.html">기록물 단일 등록</a>
                <a class="dropdown-item" href="./record_multi_regist.html">기록물 다중 등록</a>
            </div>
        </div>
        <div class="menu">
            <a href="php/record_list_view.html.php">기록물 조회</a>
        </div>
        <div class="menu">
            <a href="#">모니터링단<br> 커뮤니티</a>
        </div>
    </div>


</header>

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
<!-- footer-->
</body>

</html>