<?php
/* Smarty version 3.1.33, created on 2019-10-01 08:05:47
  from 'D:\phpstudy\PHPTutorial\WWW\PHPCollection\PHPmesslayui\view\Index\reply.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d9308dbce3267_05383205',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '511e0b3d21cb98ab37daa7f51a4ead11034871ef' => 
    array (
      0 => 'D:\\phpstudy\\PHPTutorial\\WWW\\PHPCollection\\PHPmesslayui\\view\\Index\\reply.php',
      1 => 1563285100,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d9308dbce3267_05383205 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>回复留言</title>
    <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['config']->value['cssurl'];?>
/style.css?t=<?php echo '<?php ';?>echo time();<?php echo '?>';?>">
</head>
<body>

<div class="msgform" style="float:left; width: 100%">
    <form action="<?php echo $_smarty_tpl->tpl_vars['config']->value['siteurl'];?>
/?a=reply" method="post" class="ajaxForm">
        <input type="hidden" name="info[id]" value="<?php echo $_smarty_tpl->tpl_vars['msgdata']->value['id'];?>
">
        <p><textarea name="info[reply_content]" id="content" cols="30" rows="10" placeholder="请输入回复内容~"><?php echo $_smarty_tpl->tpl_vars['msgdata']->value['reply_content'];?>
</textarea></p>
        <p><button id="replyBtn">提交</button></p>
    </form>
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
