<?php
header('Content-type:text/html; Charset=utf8');
if (!isset($_COOKIE['username']) || !isset($_COOKIE['auth'])) {
    exit("<script>
alert('请你先登录后再访问');
location.href='login.php';
</script>");
}
//校验用户凭证
$auth = $_COOKIE['auth'];
$resArr = explode(':', $auth);
$userId = end($resArr);
$link = mysqli_connect('localhost', 'root', 'root') or die('Connect error');
mysqli_set_charset($link, 'utf8');
mysqli_select_db($link, 'php') or die('Database open error');
$sql = 'SELECT user_id AS userId, name AS username, password FROM user WHERE user_id = ' . $userId;
$result = mysqli_query($link, $sql);
if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $password = $row['password'];
    $salt = 'king';
    $authStr = md5($username.$password.$salt );
    if ($authStr != $resArr[0]) {
        exit("<script>
alert('请您先登陆后再访问');
location.href='login.php';
</script>");
    }
} else {
    exit("<script>
alert('请您先登陆后再访问');
location.href='login.php';
</script>");
}