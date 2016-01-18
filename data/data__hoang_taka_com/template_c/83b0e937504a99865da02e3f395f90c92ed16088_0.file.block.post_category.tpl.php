<?php /* Smarty version 3.1.28-dev/54, created on 2016-01-18 13:01:42
         compiled from "C:\xampp\htdocs\mtb\themes\tpl-01\block.post_category.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:786569c7fc6883d96_76320907%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_569c7fc68a7023_93238542',
  'file_dependency' => 
  array (
    '83b0e937504a99865da02e3f395f90c92ed16088' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mtb\\themes\\tpl-01\\block.post_category.tpl',
      1 => 1452592141,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569c7fc68a7023_93238542')) {
function content_569c7fc68a7023_93238542 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '786569c7fc6883d96_76320907';
if ($_smarty_tpl->tpl_vars['post_show_sub_object']->value == "yes") {?>
	<div class="tpl-01-block-post-list">
		<div class="block-header">
			<p class="title">Danh sách bài viết: <?php echo $_smarty_tpl->tpl_vars['object_name']->value;?>
</p>
		</div>
		<div class="list-post">
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null, 0);?>
			<?php
$_from = $_smarty_tpl->tpl_vars['listdata']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_post_0_saved_item = isset($_smarty_tpl->tpl_vars['post']) ? $_smarty_tpl->tpl_vars['post'] : false;
$_smarty_tpl->tpl_vars['post'] = new Smarty_Variable();
$__foreach_post_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_post_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['post']->value) {
$__foreach_post_0_saved_local_item = $_smarty_tpl->tpl_vars['post'];
?>
				<div class="one-post post-<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
">
					<div class="thumbnail">
						<img class="thumb" src="<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" />
					</div>
					<div class="context">
						<a class="link" href="<?php echo $_smarty_tpl->tpl_vars['post']->value['nice_url'];?>
"><i class="fa fa-pencil"></i> <?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>
</a>
						<div class="details">
							<p class="post-date"><i class="fa fa-clock-o"></i> Time: <?php echo $_smarty_tpl->tpl_vars['post']->value['date_created'];?>
</p>
							<p class="post-viewed"><i class="fa fa-eye"></i> Viewed: <?php echo $_smarty_tpl->tpl_vars['post']->value['viewed'];?>
</p>
						</div>
						<div class="preview">
							<?php echo $_smarty_tpl->tpl_vars['post']->value['short_descripton'];?>

						</div>
					</div>
				</div>
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
			<?php
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_0_saved_local_item;
}
}
if ($__foreach_post_0_saved_item) {
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_0_saved_item;
}
?>
		</div>
		<a class="view-all" href="<?php echo $_smarty_tpl->tpl_vars['object_link']->value;?>
">Xem tất cả</a>
	</div>
<?php } else { ?>
	<div class="tpl-01-block-category-list">
		<div class="block-header">
			<p class="title">Danh sách danh mục: <?php echo $_smarty_tpl->tpl_vars['object_name']->value;?>
</p>
		</div>
		<div class="list-category">
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null, 0);?>
			<?php
$_from = $_smarty_tpl->tpl_vars['listdata']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_cat_1_saved_item = isset($_smarty_tpl->tpl_vars['cat']) ? $_smarty_tpl->tpl_vars['cat'] : false;
$_smarty_tpl->tpl_vars['cat'] = new Smarty_Variable();
$__foreach_cat_1_total = $_smarty_tpl->_count($_from);
if ($__foreach_cat_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['cat']->value) {
$__foreach_cat_1_saved_local_item = $_smarty_tpl->tpl_vars['cat'];
?>
				<div class="one-cat" data="$cat.id" data-click-href="$cat.nice_url">
					<img class="thumb" src="<?php echo $_smarty_tpl->tpl_vars['cat']->value['image'];?>
" />
					<a class="link" href="<?php echo $_smarty_tpl->tpl_vars['cat']->value['nice_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a>
				</div>
			<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable($_smarty_tpl->tpl_vars['i']->value+1, null, 0);?>
			<?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved_local_item;
}
}
if ($__foreach_cat_1_saved_item) {
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved_item;
}
?>
		</div>
		<a class="view-all" href="<?php echo $_smarty_tpl->tpl_vars['object_link']->value;?>
">Xem tất cả</a>
	</div>
<?php }
}
}
?>