<!DOCTYPE html>
<?php session_start(); ?>
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
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <a href="index.html">
                <img src="../image/rikar_logo.png" alt="로고" class="logo">
            </a>
        </div>
        <div class="application-name">
            <img src="../image/wp_title.png" alt="">
            <!-- <p>원평동<br>
                도시재생기록화</p> -->
        </div>
        <div class="login">
            <a href="login.html"><img src="../image/login.png" alt=""></a>
        </div>
    </div>
    <div class="menu-group">
        <div class="menu">
            <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                <img src="../image/record_regist.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="record_single_regist.html">기록물 단일 등록</a>
                <a class="dropdown-item" href="./record_multi_regist.html">기록물 다중 등록</a>
            </div>
        </div>
        <div class="menu">
            <a href="php/record_list_view.html.php"><img src="../image/record_view.png" alt=""></a>
        </div>
        <!-- <div class="menu">
        <a href="#">모니터링단<br> 커뮤니티</a> -->
    </div>
    </div>
</header>
<?php
if (!isset($_SESSION['user_id']) || $_SESSION['password']) { ?>
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>로그인</h3>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="user_id" placeholder="아이디" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="비밀번호" value=""/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="로그인"/>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <?php
} else {
    echo "로그인이 되어 있습니다.";
}
?>
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