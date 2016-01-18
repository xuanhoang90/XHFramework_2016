<?php /* Smarty version 3.1.28-dev/54, created on 2015-10-12 09:53:42
         compiled from "C:\xampp\htdocs\TAKA\themes\tpl-01\block.post_list.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:4103561b20b6470c74_88644938%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_561b20b64a62f6_67360571',
  'file_dependency' => 
  array (
    '5beacc6bb6cc67a3932f81eee328ab4a21cf2c31' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TAKA\\themes\\tpl-01\\block.post_list.tpl',
      1 => 1443552628,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_561b20b64a62f6_67360571')) {
function content_561b20b64a62f6_67360571 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '4103561b20b6470c74_88644938';
?>
<div class="tpl-01-block-post-list tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
" data="<?php echo $_smarty_tpl->tpl_vars['flag']->value;?>
">
	<div class="block-header">
		<p class="title"><i class="fa fa-newspaper-o"></i> Danh sách bài viết</p>
	</div>
	<div class="list-post">
		<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(1, null, 0);?>
		<?php
$_from = $_smarty_tpl->tpl_vars['postlist']->value;
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
	<?php echo '<script'; ?>
>
		$(function(){
			//slider auto play
			var _XHSlider = function(ele){
				var _NumberSlider = $(ele).find(".list-post").children().length;
				var _ExtendHtml = "<div class='x-nav-btn-slider'>";
				for(i = 1; i <= _NumberSlider; i++){
					_ExtendHtml += "<p class='slider-btn-switch' data='"+i+"'>"+i+"</p>";
				}
				_ExtendHtml += "</div>";
				$(ele).append(_ExtendHtml);
				$(ele).find(".one-post").hide();
				$(ele).find(".post-1").show();
				$(ele).find(".slider-btn-switch").first().addClass("active");
			}
			var _Flag = $(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").attr("data");
			if(_Flag == "frontend"){
				if($(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").parent().parent().parent().hasClass("col-md-12")){
					$(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
");
				}
				if($(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").parent().parent().parent().hasClass("col-md-9")){
					$(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
");
				}
				if($(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").parent().parent().parent().hasClass("col-md-8")){
					$(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
");
				}
			}
			if(_Flag == "backend"){
				if($(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").parent().parent().parent().hasClass("col-md-12")){
					$(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
");
				}
				if($(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").parent().parent().parent().hasClass("col-md-9")){
					$(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
");
				}
				if($(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").parent().parent().parent().hasClass("col-md-8")){
					$(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
").addClass("tpl-01-block-post-list-large");
					_XHSlider(".tpl-01-block-post-list-<?php echo $_smarty_tpl->tpl_vars['rand']->value;?>
");
				}
			}
		})
	<?php echo '</script'; ?>
>
</div><?php }
}
?>