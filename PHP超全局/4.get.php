<!DOCTYPE html>
<html>
<head>
	<title>ttt</title>
</head>
<body>
	<form name="aaaa" method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<input type="text" name="name">
		<input type="submit" name="按钮">
	</form>

	<?php
	if(isset($_GET['name'])){
		var_dump($_GET['name']);
	}else{
	}
	
	?>

</body>
</html>