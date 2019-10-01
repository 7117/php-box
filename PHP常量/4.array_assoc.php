<?php
// array(6) { [0]=> int(1) [1]=> int(2) [2]=> int(3) [3]=> int(4) [4]=> int(5) [5]=> int(6) }
const aaa=[1,2,3,4,5,6];
var_dump(aaa);
echo "<br>";

// array(5) { [0]=> int(1) [1]=> int(34) [2]=> int(666) [3]=> int(666) [4]=> int(8888) }
define('bbb',[1,34,666,666,8888]);
var_dump(bbb);
echo "<br>";

$t=[1,34,666,666,8888];
define('eee',$t);
var_dump(eee);


