<?php

header( 'Content-type:text/html;Charset=utf8' );
if ( isset( $_COOKIE['username'] ) && isset( $_COOKIE['auth'] ) ) {
//校验用户凭证
    $auth = $_COOKIE['auth'];
    $resArr = explode( ':', $auth );
    $userId = end( $resArr );
    $link = mysqli_connect( 'localhost', 'root', 'root' ) or die( 'Connect error' );
    mysqli_set_charset( $link, 'utf8' );
    mysqli_select_db( $link, 'php' ) or die( 'Database open error' );
    $sql = 'SELECT user_id AS userId, name AS username, password FROM user WHERE user_id = ' . $userId;
    $result = mysqli_query( $link, $sql );
    if ( mysqli_num_rows( $result ) == 1 ) {
        $row = mysqli_fetch_assoc( $result );
        $username = $row['username'];
        $password = $row['password'];
        $salt = 'king';
        $authStr = md5( $username.$password.$salt );
        if ($authStr == $resArr[0]) {
            exit( "
        <script>
        alert('你已经登录，即将跳转');
        location.href='index.php';        
        </script>
        " );
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>登录表单</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 50px;
        }

        .starter-template {
            padding: 40px 15px;
            text-align: center;
        }
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">会话技术</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">主页</a></li>
                <li><a href="#about">关于我们</a></li>
                <li><a href="#contact">联系方式</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>

<div class="container">
    <h1 class="text-center">登录页面</h1>
    <form action="doLogin.php" method="post" role="form">
        <div class="form-group">
            <label for="username" class="col-sm-2">用户名</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="username" id="username" placeholder="Enter username">
            </div>
        </div>

        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">密码</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="password" id="password" placeholder="Enter password">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="autoLogin" value="1">一周内自动登录
                    </label>
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">提交</button>
    </form>
</div><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>