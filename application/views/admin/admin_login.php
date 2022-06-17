<!DOCTYPE html>
<html lang="ko">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="/assets/images/favicon/favicon.png" rel="shortcut icon" type="image/x-icon">

    <title>로그인 </title>

    <!-- Bootstrap -->
    <link href="<?=base_url('assets/template/bootstrap/dist/css/bootstrap.min.css')?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?=base_url('assets/template/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?=base_url('assets/template/animate.css/animate.min.css')?>" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="<?=base_url('assets/template/build/custom.min.css')?>" rel="stylesheet">
    <!-- Admin CSS -->
    <link href="/assets/css/admin.css" rel="stylesheet">
</head>

<!-- jQuery -->
<script src="<?=base_url('assets/template/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/js/common.js')?>"></script>
<script src="<?=base_url('assets/js/admin.js')?>"></script>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="" onsubmit="return false;">
                    <h1><img src="/assets/images/logo.png" class="login_symbol" alt=""></h1>
                    <div>
                        <input type="text" class="form-control log req" name = "id" placeholder="아이디" required="required" />
                    </div>
                    <div>
                        <input type="password" class="form-control log req" name = "pass" placeholder="비밀번호" required="required" />
                    </div>
                    <div>
                        <a id = "logingo" class="btn btn-default submit">Log in</a>
                        <button type = "submit" style = "display : none;"></button>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <div>
                            <p>Copyright © 평화수상레저. All rights reserved.</p>
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
