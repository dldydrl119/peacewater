<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
    <meta name="robots" content="index,follow">

    <meta name="naver-site-verification" content="df0041beb46b82e1c457c88e9d3602bda8d48427" />
    <meta name="google-site-verification" content="q8ZY5ejP_4gfooHCuO9Py6R_lR4J35bPRQlQmdRSCQk" />

    <title>평화수상레저</title>

    <meta name="title" content="평화수상레저" />
    <meta name="description" content="남양주 평화수상레져 놀러오세요~">
    <meta name="keywords" content="평화수상레저,남양주,수상스키,웨이크보드,웨이크서핑,플라이보드,바베큐,워터파크,물놀이,펜션,수상레저">
    <meta name="author" content="평화수상레저">

    <link href="/assets/images/favicon/favicon.png" rel="shortcut icon" type="image/x-icon">
    <link href="https://peacewater.co.kr" rel="canonical">

    <!-- SNS -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="평화수상레저" />
    <meta property="og:site_name" content="평화수상레저" />
    <meta property="og:image" content="/assets/images/logo.png" />
    <meta property="og:description" content="남양주 평화수상레져 놀러오세요~" />
    <meta property="og:url" content="http://peacewater.co.kr/" />

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css?v=<?= time() ?>" rel="stylesheet">
    <link href="/assets/lib/slick/slick.css?v=<?= time() ?>" rel="stylesheet" type="text/css">
    <link href="/assets/lib/slick/slick-theme.css?v=<?= time() ?>" rel="stylesheet" type="text/css">
    <link href="/assets/lib/animate/animate.css?v=<?= time() ?>" rel="stylesheet" type="text/css">
    <link href="/assets/css/global.css?v=<?= time() ?>" rel="stylesheet" type="text/css">
    <link href="/assets/css/main.css?v=<?= time() ?>" rel="stylesheet" type="text/css">
    <script src="/assets/js/InstagramFeed.js?v=<?= time() ?>"></script>
    <script src="/assets/js/InstagramFeed.min.js?v=<?= time() ?>"></script>
</head>

<?php if (!isset($_SERVER["HTTPS"])) {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"], true, 301);
    exit;}
?>

<body>
    <script>
        window.fbAsyncInit = function() {
            FB.init({
                appId: '368177001649053',
                xfbml: true,
                version: 'v11.0'
            });
            FB.AppEvents.logPageView();
        };

        (function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {
                return;
            }
            js = d.createElement(s);
            js.id = id;
            js.src = "https://connect.facebook.net/en_US/sdk.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>
    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Preloader_END -->




    <!-- Navigation -->
    <header>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="logo">
                    <a href="/">
                        <img src="/assets/images/logo_w.png" title="로고" alt="로고" />
                    </a>
                </div>

                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#custom-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>

                <div class="collapse navbar-collapse" id="custom-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#Modal_3">예약하기</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-toggle="modal" data-target="#Modal_4">이용요금</a>
                        </li>
                    </ul>
                </div>
            </div><!-- Container_END -->
        </nav>
    </header>
    <!-- Navigation_END -->