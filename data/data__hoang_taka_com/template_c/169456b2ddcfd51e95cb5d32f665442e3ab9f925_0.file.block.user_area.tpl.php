<?php /* Smarty version 3.1.28-dev/54, created on 2016-01-18 13:01:42
         compiled from "C:\xampp\htdocs\mtb\themes\tpl-01\block.user_area.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:11636569c7fc6854f80_77234165%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_569c7fc6858e07_78907308',
  'file_dependency' => 
  array (
    '169456b2ddcfd51e95cb5d32f665442e3ab9f925' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mtb\\themes\\tpl-01\\block.user_area.tpl',
      1 => 1453096560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569c7fc6858e07_78907308')) {
function content_569c7fc6858e07_78907308 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '11636569c7fc6854f80_77234165';
?>
<div class="tpl-block-user-area">
	<h2 class="title">Thành viên</h2>
	<?php if ($_smarty_tpl->tpl_vars['is_logined']->value) {?>
		<div class="main">
			<a>Dăng ký</a>
			<a>Dăng nhập</a>
		</div>
	<?php } else { ?>
		<div class="main">
			<form method="post" action="#" class="loginform">
				<div class="xform-group">
					<p class="label">Account ID: </p>
					<input class="input-text" name="username" placeholder="Account ID" type="text" />
				</div>
				<div class="xform-group">
					<p class="label">Password: </p>
					<input class="input-text" name="userpass" placeholder="Password" type="password" />
				</div>
				<div class="xform-group">
					<input type="submit" class="input-submit" name="submit" value="Let's go!!" />
				</div>
			</form>
			<a class="link" href="#">Đăng ký tài khoản</a>
			<a class="link" href="#">Quên mật khẩu</a>
		</div>
	<?php }?>
</div><?php }
}
?>