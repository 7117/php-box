<?php
include "validate.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Page Description">
    <meta name="author" content="root">
    <title>登录首页</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    nav.navbar-inverse {
        line-height: 1em;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <a class="navbar-brand" href="#">EasyFound</a>
    <ul class="nav navbar-nav">
        <li class="active">
            <a href="#" class="active">首页</a>
        </li>
        <li>
            <a href="#">热门技术</a>
        </li>
        <li><a href="#">欢迎您,<?php echo $_COOKIE['username'] ?></a>!</li>
    </ul>
</nav>
<h1 class="text-center">首页</h1>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="http://libs.baidu.com/jquery/2.0.0/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>