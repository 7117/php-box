<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Page Description">
    <meta name="author" content="root">
    <title>登录首页</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <style>
        nav.navbar-inverse {
            line-height: 1em;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-inverse">
    <ul class="nav navbar-nav">
        <li><a href="#">欢迎您,<?php echo $_COOKIE['username'] ?></a>!</li>
    </ul>
</nav>
</body>
</html>