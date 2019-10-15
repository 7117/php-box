<!DOCTYPE html>
<html>
<head>
    <title>时间控件</title>
    <link rel="stylesheet" type="text/css" href="../datetimepicker/jquery.simple-dtpicker.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="../datetimepicker/jquery.simple-dtpicker.js"></script>
    <script src="../datetimepicker/jquery.simple-dtpicker.css"></script>
</head>
<body>
    <form action="13.action.php" method="post">
        <input type="text" name="datetime" id="datetimepicker">
    </form>
</body>
</html>

<script type="text/javascript">
    $("#datetimepicker").datetimepicker();
</script>