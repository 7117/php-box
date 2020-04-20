<?php

$p = $_GET['p'];
$limit = ($p - 1) * 2;
$offset = 2;

define('host', '127.0.0.1');
define('user', 'root');
define('pwd', 'root');
define('db', 'ms');
define('port', 3306);

$db = new mysqli(host, user, pwd, db, port);

$sql = 'select * from www_message' . " limit $limit,$offset";
$result = mysqli_query($db, $sql);
$sql2 = 'select count(*) from www_message';
$result2 = mysqli_query($db, $sql2);
$info2 = mysqli_fetch_all($result2, MYSQLI_NUM);
$info2 = $info2[0][0];

// 获取数据
$info = mysqli_fetch_all($result, MYSQLI_ASSOC);


echo '<table border="1px">';
echo '<tr>';
echo '<th>title</th>';
echo '<th>uip</th>';
echo '<th>cntent</th>';
echo '</tr>';
foreach ($info as $k => $v) {
    echo "<tr>";
    echo "<td>{$v['title']}</td>";
    echo "<td>{$v['uip']}</td>";
    echo "<td>{$v['content']}</td>";
    echo "</tr>";
}


echo '</table>';


echo "{$info2}";
echo "<br>";
echo $p;

