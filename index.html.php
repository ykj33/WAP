<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WAP</title>

    <!-- css 리셋 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/reset-css@5.0.1/reset.min.css" />
    <!--    material-icons-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@500&display=swap" rel="stylesheet">
    <!-- SWIPER -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
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
<!-- header -->
<header>
    <div class="logo-line">
        <div class="logo">
            <a href="index.html">
                <img src="./image/rikar_logo.png" alt="로고" class="logo">
            </a>
        </div>
        <div class="application-name">
            <img src="image/wp_title.png" alt="">
            <!-- <p>원평동<br>
                도시재생기록화</p> -->
        </div>
        <!-- <div class=" ">
            <a href="login.html"><img src="image/login.png" alt=""></a>
        </div> -->
    </div>
    <div class="menu-group">
        <div class="menu">
            <a id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true">
                <img src="image/record_regist.png" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="record_single_regist.html">기록물 단일 등록</a>
                <a class="dropdown-item" href="./record_multi_regist.html">기록물 다중 등록</a>
            </div>
        </div>
        <div class="menu">
            <a href="php/record_list_view.html.php"><img src="image/record_view.png" alt=""></a>
        </div>
        <!-- <div class="menu">
        <a href="#">모니터링단<br> 커뮤니티</a> -->
    </div>
    </div>
</header>
<!-- header -->

<!-- content-->

<!-- inner -->
<inner>
    <div class="pposter"><img src="image/wp_poster.jpg" width="800px"></div>
    <div class="poster-right">
        <div>
            <h2>모니터링단</h2>
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>1회차<br>7월 27일</th>
                    <th>2회차<br>7월 28일</th>
                    <th>3회차<br>8월 3일</th>
                    <th>4회차<br>8월 4일</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>13시 ~<br>15시</td>
                    <td>현장조사</td>
                    <td>현장조사</td>
                    <td>현장조사</td>
                    <td>현장조사</td>
                </tr>
                <tr>
                    <td>15시~<br>17시</td>
                    <td>공유 및 정리</td>
                    <td>공유 및 정리</td>
                    <td>공유 및 정리</td>
                    <td>공유 및 정리</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                </tbody>
            </table>
        </div>
        <div>
            <h2>아카이빙단</h2>
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>1회차<br>8월 10일</th>
                    <th>2회차<br>8월 11일</th>
                    <th>3회차<br>8월 17일</th>
                    <th>4회차<br>8월 18일</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>13시 ~<br>15시</td>
                    <td>현장활동</td>
                    <td>현장활동</td>
                    <td>현장활동</td>
                    <td>현장활동</td>
                </tr>
                <tr>
                    <td>15시~<br>17시</td>
                    <td>공유 및 정리</td>
                    <td>공유 및 정리</td>
                    <td>공유 및 정리</td>
                    <td>공유 및 정리</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                </tbody>
            </table>
        </div>
    </div>

</inner>
<!-- inner -->

<!-- footer-->
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
            <img src="image/wp_logo.png">
            <img src="image/OCS_logo2.png">
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
<!-- footer-->
</body>

</html>