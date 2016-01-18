<?php /* Smarty version 3.1.28-dev/54, created on 2016-01-18 12:56:39
         compiled from "C:\xampp\htdocs\mtb\themes\tpl-01\main.post_category.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:15266569c7e9705d791_63837444%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_569c7e971289c1_34577286',
  'file_dependency' => 
  array (
    '660fc3a14336d6e621d6d3f4234fd94f3c270298' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mtb\\themes\\tpl-01\\main.post_category.tpl',
      1 => 1452687571,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569c7e971289c1_34577286')) {
function content_569c7e971289c1_34577286 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '15266569c7e9705d791_63837444';
if ($_smarty_tpl->tpl_vars['show_brc']->value == "yes") {?>
	<div class="breadcrumb">
		<p>Breadcrumb</p>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['show_desc']->value == "yes") {?>
	<div class="category-description">
		<h1 ><?php echo $_smarty_tpl->tpl_vars['cat_name']->value;?>
</h1>
		<p><?php echo $_smarty_tpl->tpl_vars['cat_desc']->value;?>
</p>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['postlist_data']->value) {?>
	<div class="post-list-contain">
		<h2 class="main-title">Danh sach bai viet thuoc danh muc: <?php echo $_smarty_tpl->tpl_vars['cat_name']->value;?>
</h2>
		<div class="post-list">
			<?php
$_from = $_smarty_tpl->tpl_vars['postlist_data']->value['list_post'];
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
				<div class="post-item">
					<div class="thumbnail">
						<img class="thumb" src="<?php echo $_smarty_tpl->tpl_vars['post']->value['image'];?>
" />
					</div>
					<div class="post-details">
						<h3 class="post-title"><a href="<?php echo $_smarty_tpl->tpl_vars['post']->value['nice_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['post']->value['name'];?>
</a></h3>
						<p class="detail post-date"><i class="fa fa-clock-o"></i> Time: <?php echo $_smarty_tpl->tpl_vars['post']->value['date_created'];?>
</p>
						<p class="detail post-viewed"><i class="fa fa-eye"></i> Viewed: <?php echo $_smarty_tpl->tpl_vars['post']->value['viewed'];?>
</p>
						<div>
							<?php echo $_smarty_tpl->tpl_vars['post']->value['short_description'];?>

						</div>
					</div>
				</div>
			<?php
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_0_saved_local_item;
}
}
if ($__foreach_post_0_saved_item) {
$_smarty_tpl->tpl_vars['post'] = $__foreach_post_0_saved_item;
}
?>
		</div>
		<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['postlist_data']->value['current_page']+1, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['prevPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['postlist_data']->value['current_page']-1, null, 0);?>
		<?php if ($_smarty_tpl->tpl_vars['postlist_data']->value['current_page'] >= $_smarty_tpl->tpl_vars['postlist_data']->value['total_page']) {?>
			<?php $_smarty_tpl->tpl_vars['curPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['postlist_data']->value['total_page'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_Variable("#", null, 0);?>
			<?php $_smarty_tpl->tpl_vars['prevPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['postlist_data']->value['current_page']-1, null, 0);?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['postlist_data']->value['current_page'] <= 1) {?>
			<?php $_smarty_tpl->tpl_vars['curPage'] = new Smarty_Variable(1, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['postlist_data']->value['current_page']+1, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['prevPage'] = new Smarty_Variable("#", null, 0);?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['prevPage']->value <= 1) {?>
			<?php $_smarty_tpl->tpl_vars['prevPage'] = new Smarty_Variable("#", null, 0);?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['nextPage']->value >= $_smarty_tpl->tpl_vars['postlist_data']->value['total_page']) {?>
			<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_Variable("#", null, 0);?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['prevPage']->value != "#") {?>
			<div class="col-xs-12 clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['root_domain']->value;?>
/post_category/<?php echo $_smarty_tpl->tpl_vars['cat_url']->value;?>
/?postcat_page=<?php echo $_smarty_tpl->tpl_vars['catlist_data']->value['current_page'];?>
&post_page=<?php echo $_smarty_tpl->tpl_vars['prevPage']->value;?>
">«</a></li>
		<?php } else { ?>
			<div class="col-xs-12 clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="#">«</a></li>
		<?php }?>
		<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 1+1 - (5) : 5-(1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 5, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable($_smarty_tpl->tpl_vars['curPage']->value-$_smarty_tpl->tpl_vars['i']->value, null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value > 0) {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['root_domain']->value;?>
/post_category/<?php echo $_smarty_tpl->tpl_vars['cat_url']->value;?>
/?postcat_page=<?php echo $_smarty_tpl->tpl_vars['catlist_data']->value['current_page'];?>
&post_page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
			<?php }?>
		<?php }
}
?>

		<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['curPage']->value;?>
</a></li>
		<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable($_smarty_tpl->tpl_vars['curPage']->value+$_smarty_tpl->tpl_vars['i']->value, null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value <= $_smarty_tpl->tpl_vars['postlist_data']->value['total_page']) {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['root_domain']->value;?>
/post_category/<?php echo $_smarty_tpl->tpl_vars['cat_url']->value;?>
/?postcat_page=<?php echo $_smarty_tpl->tpl_vars['catlist_data']->value['current_page'];?>
&post_page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
			<?php }?>
		<?php }
}
?>

		<?php if ($_smarty_tpl->tpl_vars['nextPage']->value != "#") {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['root_domain']->value;?>
/post_category/<?php echo $_smarty_tpl->tpl_vars['cat_url']->value;?>
/?postcat_page=<?php echo $_smarty_tpl->tpl_vars['catlist_data']->value['current_page'];?>
&post_page=<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">»</a></li>
			</ul>
		</div>
		<?php } else { ?>
				<li><a href="#">»</a></li>
			</ul>
		</div>
		<?php }?>
	</div>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['catlist_data']->value) {?>
	<div class="postcat-list-contain">
		<h2 class="main-title">Danh sach danh muc con thuoc danh muc: <?php echo $_smarty_tpl->tpl_vars['cat_name']->value;?>
</h2>
		<div class="postcat-list">
			<?php
$_from = $_smarty_tpl->tpl_vars['catlist_data']->value['list_postcat'];
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
				<div class="postcat-item">
					<div class="thumbnail">
						<img class="thumb" src="<?php echo $_smarty_tpl->tpl_vars['cat']->value['image'];?>
" />
					</div>
					<div class="cat-details">
						<h3 class="cat-title"><a href="<?php echo $_smarty_tpl->tpl_vars['cat']->value['nice_url'];?>
"><?php echo $_smarty_tpl->tpl_vars['cat']->value['name'];?>
</a></h3>
						<div>
							<?php echo $_smarty_tpl->tpl_vars['cat']->value['short_description'];?>

						</div>
					</div>
				</div>
			<?php
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved_local_item;
}
}
if ($__foreach_cat_1_saved_item) {
$_smarty_tpl->tpl_vars['cat'] = $__foreach_cat_1_saved_item;
}
?>
		</div>
		<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['catlist_data']->value['current_page']+1, null, 0);?>
		<?php $_smarty_tpl->tpl_vars['prevPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['catlist_data']->value['current_page']-1, null, 0);?>
		<?php if ($_smarty_tpl->tpl_vars['catlist_data']->value['current_page'] >= $_smarty_tpl->tpl_vars['catlist_data']->value['total_page']) {?>
			<?php $_smarty_tpl->tpl_vars['curPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['catlist_data']->value['total_page'], null, 0);?>
			<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_Variable("#", null, 0);?>
			<?php $_smarty_tpl->tpl_vars['prevPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['catlist_data']->value['current_page']-1, null, 0);?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['catlist_data']->value['current_page'] <= 1) {?>
			<?php $_smarty_tpl->tpl_vars['curPage'] = new Smarty_Variable(1, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_Variable($_smarty_tpl->tpl_vars['catlist_data']->value['current_page']+1, null, 0);?>
			<?php $_smarty_tpl->tpl_vars['prevPage'] = new Smarty_Variable("#", null, 0);?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['prevPage']->value <= 1) {?>
			<?php $_smarty_tpl->tpl_vars['prevPage'] = new Smarty_Variable("#", null, 0);?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['nextPage']->value >= $_smarty_tpl->tpl_vars['catlist_data']->value['total_page']) {?>
			<?php $_smarty_tpl->tpl_vars['nextPage'] = new Smarty_Variable("#", null, 0);?>
		<?php }?>
		<?php if ($_smarty_tpl->tpl_vars['prevPage']->value != "#") {?>
			<div class="col-xs-12 clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['root_domain']->value;?>
/post_category/<?php echo $_smarty_tpl->tpl_vars['cat_url']->value;?>
/?post_page=<?php echo $_smarty_tpl->tpl_vars['postlist_data']->value['current_page'];?>
&postcat_page=<?php echo $_smarty_tpl->tpl_vars['prevPage']->value;?>
">«</a></li>
		<?php } else { ?>
			<div class="col-xs-12 clearfix">
				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a href="#">«</a></li>
		<?php }?>
		<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 1+1 - (5) : 5-(1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 5, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable($_smarty_tpl->tpl_vars['curPage']->value-$_smarty_tpl->tpl_vars['i']->value, null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value > 0) {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['root_domain']->value;?>
/post_category/<?php echo $_smarty_tpl->tpl_vars['cat_url']->value;?>
/?post_page=<?php echo $_smarty_tpl->tpl_vars['postlist_data']->value['current_page'];?>
&postcat_page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
			<?php }?>
		<?php }
}
?>

		<li><a href="#"><?php echo $_smarty_tpl->tpl_vars['curPage']->value;?>
</a></li>
		<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? 5+1 - (1) : 1-(5)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<?php $_smarty_tpl->tpl_vars['page'] = new Smarty_Variable($_smarty_tpl->tpl_vars['curPage']->value+$_smarty_tpl->tpl_vars['i']->value, null, 0);?>
			<?php if ($_smarty_tpl->tpl_vars['page']->value <= $_smarty_tpl->tpl_vars['catlist_data']->value['total_page']) {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['root_domain']->value;?>
/post_category/<?php echo $_smarty_tpl->tpl_vars['cat_url']->value;?>
/?post_page=<?php echo $_smarty_tpl->tpl_vars['postlist_data']->value['current_page'];?>
&postcat_page=<?php echo $_smarty_tpl->tpl_vars['page']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['page']->value;?>
</a></li>
			<?php }?>
		<?php }
}
?>

		<?php if ($_smarty_tpl->tpl_vars['nextPage']->value != "#") {?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['root_domain']->value;?>
/post_category/<?php echo $_smarty_tpl->tpl_vars['cat_url']->value;?>
/?post_page=<?php echo $_smarty_tpl->tpl_vars['postlist_data']->value['current_page'];?>
&postcat_page=<?php echo $_smarty_tpl->tpl_vars['nextPage']->value;?>
">»</a></li>
			</ul>
		</div>
		<?php } else { ?>
				<li><a href="#">»</a></li>
			</ul>
		</div>
		<?php }?>
	</div>
<?php }
}
}
?>