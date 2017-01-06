<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="#" type="image/png">

    <title>注册</title>

    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-body">

<div class="container">

    <form class="form-signin" method="post" action="doreg">
        <div class="form-signin-heading text-center">
            <h1 class="sign-title">注册</h1>
            <img src="/images/login-logo.png" alt=""/>
        </div>


        <div class="login-wrap">
            @if(count($errors)>0)
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        <li>{{$error}}</li>
                    </div>
                @endforeach
            @endif
            <p> 输入用户信息 </p>
            {{csrf_field()}}
            <input name="name" type="text" autofocus="" placeholder="User Name" class="form-control">
            <input name="password" type="password" placeholder="Password" class="form-control">
            <input name="password_confirmation" type="password" placeholder="Re-type Password" class="form-control">
            <label class="checkbox">
                <input type="checkbox" value="agree this condition">我同意你们网站的协议
            </label>
            <button type="submit" class="btn btn-lg btn-login btn-block">
                <i class="fa fa-check"></i>
            </button>

            <div class="registration">
                已经注册
                <a href="login.html" class="">
                    登录
                </a>
            </div>

        </div>

    </form>

</div>
<script src="/js/jquery-1.10.2.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/modernizr.min.js"></script>

</body>
</html>
