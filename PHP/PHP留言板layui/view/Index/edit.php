<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改留言</title>
    <link rel="stylesheet" href="{$config.cssurl}/style.css?t=<?php echo time();?>">
</head>
<body>

<div class="msgform" style="float:left; width: 100%">
    <form action="{$config.siteurl}/?a=reply" method="post" class="ajaxForm">
        <input type="hidden" name="info[id]" value="{$msgdata.id}">
        <p><input type="text" name="info[title]" id="title" value="{$msgdata.title}" placeholder="留言主题"/></p>
        <p><textarea name="info[content]" id="content" cols="30" rows="8" placeholder="请输入回复内容~">{$msgdata.content}</textarea></p>
        <p><button id="replyBtn">提交</button></p>
    </form>
</div>
<script type="text/javascript">
    var HY = {
        siteUrl: "{$config.siteurl}"
    };
</script>
<script type="text/javascript" src="{$config.jsurl}/jquery.min.js"></script>
<script type="text/javascript" src="{$config.jsurl}/jquery.form.min.js"></script>
<script type="text/javascript" src="{$config.jsurl}/common.js?t=<?php echo time();?>"></script>
</body>
</html>