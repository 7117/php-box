<html>
<?php

$p = isset($_GET['p'])?$_GET['p']:1;

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

$self = $_SERVER['PHP_SELF'];
var_dump($self);
$prv = $p - 1;
$aft = $p + 1;
$page_num=ceil($info2/2);

$pjian2=$p-2;
$pjia2=$p+2;

if($p==1){
    $prv=1;
}
if($p>=$page_num){
    $aft=$page_num;
}

if($p!=1){
    echo "<a href='{$self}?p=1'>首页</a>";
}
echo "<a href='{$self}?p={$prv}'>上一页</a>";

echo "......";

$jian2=$p-1;
$jia2=$p+1;
echo "<a href='{$self}?p={$jian2}'>$jian2</a>";
echo "<a href='{$self}?p={$p}'>$p</a>";
echo "<a href='{$self}?p={$jia2}'>$jia2</a>";

echo "......";

echo "<a href='{$self}?p={$aft}'>下一页</a>";
if($p!=$page_num){
    echo "<a href='{$self}?p={$page_num}'>尾页</a>";
}
echo "<br>";


echo '</table>';

echo "总的页数：{$page_num}";
echo "<br>";
echo '当前页数' . $p;


?>
</html>

