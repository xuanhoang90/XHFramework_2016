<?php /* Smarty version 3.1.28-dev/54, created on 2016-01-18 13:03:56
         compiled from "C:\xampp\htdocs\mtb\themes\tpl-01\main.login.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:21960569c804c76e316_23666729%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_569c804c76e311_31220844',
  'file_dependency' => 
  array (
    'bb2b71733946da9c1aaf4e4a0ea2067bf774563b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mtb\\themes\\tpl-01\\main.login.tpl',
      1 => 1453096999,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569c804c76e311_31220844')) {
function content_569c804c76e311_31220844 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '21960569c804c76e316_23666729';
?>
<div class="tpl-block-user-area">
	<h2 class="title">Thành viên</h2>
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
</div><?php }
}
?>