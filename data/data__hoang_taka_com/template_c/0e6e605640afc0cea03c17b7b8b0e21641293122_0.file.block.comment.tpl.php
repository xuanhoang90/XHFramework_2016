<?php /* Smarty version 3.1.28-dev/54, created on 2016-01-18 12:59:24
         compiled from "C:\xampp\htdocs\mtb\themes\tpl-01\block.comment.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:3475569c7f3c93d034_43407512%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_569c7f3c94ca31_02516387',
  'file_dependency' => 
  array (
    '0e6e605640afc0cea03c17b7b8b0e21641293122' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mtb\\themes\\tpl-01\\block.comment.tpl',
      1 => 1453096760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569c7f3c94ca31_02516387')) {
function content_569c7f3c94ca31_02516387 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '3475569c7f3c93d034_43407512';
?>
<div class="tpl-01-block-comment">
	<p class="title">Bình luận</p>
	<div class="list-comment">
		<?php
$_from = $_smarty_tpl->tpl_vars['list_comment']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_comment_0_saved_item = isset($_smarty_tpl->tpl_vars['comment']) ? $_smarty_tpl->tpl_vars['comment'] : false;
$_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable();
$__foreach_comment_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_comment_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['comment']->value) {
$__foreach_comment_0_saved_local_item = $_smarty_tpl->tpl_vars['comment'];
?>
			<div class="one-comment">
				<div class="image">
					<img src="/admin/skin/style/images/default_image.png" />
				</div>
				<div class="main">
					<div class="name">
						<p class="cmt-by">Ng X Hoang</p>
					</div>
					<div class="content">
						<?php echo $_smarty_tpl->tpl_vars['comment']->value['content'];?>

					</div>
				</div>
			</div>
		<?php
$_smarty_tpl->tpl_vars['comment'] = $__foreach_comment_0_saved_local_item;
}
}
if ($__foreach_comment_0_saved_item) {
$_smarty_tpl->tpl_vars['comment'] = $__foreach_comment_0_saved_item;
}
?>
			<div class="one-comment">
				<div class="image">
					<img src="/admin/skin/style/images/default_image.png" />
				</div>
				<div class="main">
					<div class="name">
						<p class="cmt-by">Ng X Hoang</p>
					</div>
					<div class="content">
						Print this page to PDF for the complete set of vectors. Or to use on the desktop, install FontAwesome.otf, set it as the font in your application, and copy and paste the icons (not the unicode) directly from this page into your designs.
					</div>
				</div>
			</div>
			<div class="one-comment">
				<div class="image">
					<img src="/admin/skin/style/images/default_image.png" />
				</div>
				<div class="main">
					<div class="name">
						<p class="cmt-by">Ng X Hoang</p>
					</div>
					<div class="content">
						Print this page to PDF for the complete set of vectors. Or to use on the desktop, install FontAwesome.otf, set it as the font in your application, and copy and paste the icons (not the unicode) directly from this page into your designs.
					</div>
				</div>
			</div>
	</div>
	<a>Hiển thị bình luận cũ hơn</a>
	<?php if ($_smarty_tpl->tpl_vars['is_logined']->value) {?>
	<div class="object-comment">
		<textarea placeholder="Your comment"></textarea>
		<input type="submit" name="comment-submit" value="Gửi bình luận" />
	</div>
	<?php } else { ?>
	<div class="object-comment">
		<p class="alert"><i class="fa fa-exclamation-triangle"></i> Vui long dang nhap de gui binh luan</p>
		<div class="link">
			<a>Dang nhap</a>
			<a>Dang ky</a>
		</div>
	</div>
	<?php }?>
</div><?php }
}
?>