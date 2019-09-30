<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{$config.sitename}</title>
    <link rel="stylesheet" href="{$config.cssurl}/style.css?t=<?php echo time();?>">
</head>
<body>
<div class="bodywrap">
    <div class="headernav">
        <img src="{$config.imgurl}/banner.jpg" alt="">
        <div>
            <h2>PT简易留言本</h2>
            <p>简单的PHP+MYSQL+MVC架构，适用于新手如何快速实战PHP之用</p>
        </div>
    </div>

    <div class="msgwrap">
        <div class="listwrap">
            {foreach $list as $val}
            <div class="msglist">
                <h3>{$val.title} <em>{date('Y-m-d h:i',$val['create_time'])}</em></h3>
                <p>{nl2br($val.content)}</p>
                {if $val['reply_content']}
                <p class="replyc"><span>{date('Y-m-d h:i',$val['reply_time'])} 回复：</span>{nl2br($val.reply_content)}</p>
                {/if}
                <p>
                    <a href="javascript:;" class="reply" data-title="回复留言" data-url="{$config.siteurl}/?a=reply&id={$val['id']}">回复</a>
                    <a href="javascript:;" class="reply edit" data-title="修改留言" data-url="{$config.siteurl}/?a=edit&id={$val['id']}">修改</a>
                    <a href="javascript:;" data-msg="确定删除该留言吗？" class="ajaxLink del" data-url="index.php?a=delete&id={$val.id}">删除</a>
                </p>
            </div>
            {/foreach}

            {$pager}
        </div>
        <div class="msgform">
            <form action="{$config.siteurl}/?a=add" method="post" class="ajaxForm">
                <p><input type="text" name="info[title]" id="title" placeholder="留言主题"/></p>
                <p><textarea name="info[content]" id="content" cols="30" rows="10" placeholder="留言内容"></textarea></p>
                <p><button id="subBtn">提交</button></p>
            </form>
        </div>

    </div>

    <footer id="footer">
        CopyRight 2015-2019 www.phpteach.com ,All Rights Reserved
    </footer>

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