<?php
/* Smarty version 3.1.33, created on 2019-10-01 06:52:25
  from 'D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPmesslayui\view\Index\index.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d92f7a97e1d17_38016625',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'df56bccacb058599a59478b798ce158eec3e9bff' => 
    array (
      0 => 'D:\\phpstudy\\PHPTutorial\\WWW\\PHPCollection\\PHPmesslayui\\view\\Index\\index.php',
      1 => 1569912737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d92f7a97e1d17_38016625 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $_smarty_tpl->tpl_vars['config']->value['sitename'];?>
</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['cssurl'];?>
/style.css?t=<?php echo '<?php ';?>echo time();<?php echo '?>';?>">
</head>
<body>
<div class="bodywrap">
    <div class="headernav">
        <img src="<?php echo $_smarty_tpl->tpl_vars['config']->value['imgurl'];?>
/banner.jpg" alt="">
        <div>
            <h2>PT简易留言本</h2>
            <p>简单的PHP+MYSQL+MVC架构，适用于新手如何快速实战PHP之用</p>
        </div>
    </div>

    <div class="msgwrap">
        <div class="listwrap">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['list']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
            <div class="msglist">
                <h3><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
 <em><?php echo date('Y-m-d h:i',$_smarty_tpl->tpl_vars['val']->value['create_time']);?>
</em></h3>
                <p><?php echo nl2br($_smarty_tpl->tpl_vars['val']->value['content']);?>
</p>
                <?php if ($_smarty_tpl->tpl_vars['val']->value['reply_content']) {?>
                <p class="replyc"><span><?php echo date('Y-m-d h:i',$_smarty_tpl->tpl_vars['val']->value['reply_time']);?>
 回复：</span><?php echo nl2br($_smarty_tpl->tpl_vars['val']->value['reply_content']);?>
</p>
                <?php }?>
                <p>
                    <a href="javascript:;" class="reply" data-title="回复留言" data-url="<?php echo $_smarty_tpl->tpl_vars['config']->value['siteurl'];?>
/index.php?a=reply&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">回复</a>
                    <a href="javascript:;" class="reply edit" data-title="修改留言" data-url="<?php echo $_smarty_tpl->tpl_vars['config']->value['siteurl'];?>
/index.php?a=edit&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">修改</a>
                    <a href="javascript:;" data-msg="确定删除该留言吗？" class="ajaxLink del" data-url="index.php?a=delete&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
">删除</a>
                </p>
            </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

            <?php echo $_smarty_tpl->tpl_vars['pager']->value;?>

        </div>
        <div class="msgform">
            <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['siteurl'];?>
/?a=add" method="post" class="ajaxForm">
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
<?php echo '<script'; ?>
 type="text/javascript">
    var HY = {
        siteUrl: "<?php echo $_smarty_tpl->tpl_vars['config']->value['siteurl'];?>
"
    };
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['jsurl'];?>
/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['jsurl'];?>
/jquery.form.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['config']->value['jsurl'];?>
/common.js?t=<?php echo '<?php ';?>echo time();<?php echo '?>';?>"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
