<?php /* Smarty version 3.1.28-dev/54, created on 2016-01-18 13:35:27
         compiled from "C:\xampp\htdocs\mtb\themes\tpl-01\main.register.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:18453569c87af4c09e6_85289213%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_569c87af4c09e2_62877418',
  'file_dependency' => 
  array (
    'ee5ab91e254dc6733d6d8f551829772f2bbcca12' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mtb\\themes\\tpl-01\\main.register.tpl',
      1 => 1453098389,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569c87af4c09e2_62877418')) {
function content_569c87af4c09e2_62877418 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '18453569c87af4c09e6_85289213';
?>
<div class="tpl-block-main-register">
	<h1 class="title">Register</h1>
	<?php if ($_smarty_tpl->tpl_vars['content']->value) {?>
		<div class="policy">
			<?php echo $_smarty_tpl->tpl_vars['content']->value;?>

		</div>
		<div class="policy-check">
			<p><input type="checkbox" name="policy_cf" value="yes" /> Tôi đã đọc và đồng ý với điều khoản </p>
		</div>
	<?php }?>
	<div class="reg-form">
		<div class="xform-group">
			<p class="label">Account ID: </p>
			<input class="input-text" name="username" placeholder="Account ID" type="text" />
		</div>
		<div class="xform-group">
			<p class="label">Password: </p>
			<input class="input-text" name="userpass" placeholder="Password" type="password" />
		</div>
		<div class="xform-group">
			<p class="label">Confirm password: </p>
			<input class="input-text" name="userpass_cf" placeholder="Confirm password" type="password" />
		</div>
		<div class="xform-group">
			<p class="label">Email: </p>
			<input class="input-text" name="useremail" placeholder="Email" type="text" />
		</div>
		<div class="xform-group">
			<p class="label">&nbsp;</p>
			<input type="submit" class="input-submit" name="submit" value="Done" />
		</div>
	</div>
</div><?php }
}
?>