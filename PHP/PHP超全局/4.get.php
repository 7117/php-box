<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<button style="width:200px;height:200px"><a href="4.get.php?name=aaaa"></a></button>
</body>
</html>


<?php
@$a=$_GET['name'];
var_dump($a);
?>