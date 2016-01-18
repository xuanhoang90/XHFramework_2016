<?php /* Smarty version 3.1.28-dev/54, created on 2016-01-18 13:35:27
         compiled from "C:\xampp\htdocs\mtb\themes\tpl-01\block.slider.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:2744569c87af50ebe9_83333922%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_569c87af5aafe9_72026723',
  'file_dependency' => 
  array (
    'f600d90696c8b97bbab1360d942db5e9b446f3f3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mtb\\themes\\tpl-01\\block.slider.tpl',
      1 => 1450120217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569c87af5aafe9_72026723')) {
function content_569c87af5aafe9_72026723 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2744569c87af50ebe9_83333922';
if (((string)$_smarty_tpl->tpl_vars['slider_data']->value)) {?>
	<div class="x-slider">
		<div class="slider">
			<?php
$_from = $_smarty_tpl->tpl_vars['slider_data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_slider_0_saved_item = isset($_smarty_tpl->tpl_vars['slider']) ? $_smarty_tpl->tpl_vars['slider'] : false;
$_smarty_tpl->tpl_vars['slider'] = new Smarty_Variable();
$__foreach_slider_0_total = $_smarty_tpl->_count($_from);
if ($__foreach_slider_0_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['slider']->value) {
$__foreach_slider_0_saved_local_item = $_smarty_tpl->tpl_vars['slider'];
?>
				<div class="x-item">
					<img src="<?php echo $_smarty_tpl->tpl_vars['slider']->value['data']['bgimg'];?>
" />
					<?php
$_from = $_smarty_tpl->tpl_vars['slider']->value['list_item'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_sub_item_1_saved_item = isset($_smarty_tpl->tpl_vars['sub_item']) ? $_smarty_tpl->tpl_vars['sub_item'] : false;
$_smarty_tpl->tpl_vars['sub_item'] = new Smarty_Variable();
$__foreach_sub_item_1_total = $_smarty_tpl->_count($_from);
if ($__foreach_sub_item_1_total) {
foreach ($_from as $_smarty_tpl->tpl_vars['sub_item']->value) {
$__foreach_sub_item_1_saved_local_item = $_smarty_tpl->tpl_vars['sub_item'];
?>
						<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['type'] == "image") {?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['img_size'] == "default_size") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("width: auto; height: auto;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['img_size'] == "fix_width") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("width: 100%; height: auto;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['img_size'] == "fix_height") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("width: auto; height: 100%;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['img_size'] == "stretch") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("width: 100%; height: 100%;", null, 0);?>
							<?php }?>
							<div class="x-slider-sub-item" data-top="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['top'];?>
" data-left="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['left'];?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['width'];?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['height'];?>
">
								<div class="context contextimage">
									<img src="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['image'];?>
" style="<?php echo $_smarty_tpl->tpl_vars['css_add']->value;?>
">
								</div>
							</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['type'] == "text") {?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['style'] == "normal") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("font-weight: normal; text-decoration: none; font-style: normal;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['style'] == "bold") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("font-weight: bold; text-decoration: none; font-style: normal;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['style'] == "underline") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("font-weight: normal; text-decoration: underline; font-style: normal;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['style'] == "italic") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("font-weight: normal; text-decoration: none; font-style: italic;", null, 0);?>
							<?php }?>
							<div class="x-slider-sub-item" data-top="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['top'];?>
" data-left="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['left'];?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['width'];?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['height'];?>
">
								<div class="context">
									<p style="text-align: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['align'];?>
; font-size: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['size'];?>
px; color: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['color'];?>
; font-family: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['font'];?>
; line-height: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['lheight'];?>
px; <?php echo $_smarty_tpl->tpl_vars['css_add']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['sub_item']->value['text'];?>
</p>
								</div>
							</div>
						<?php }?>
						
						<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['type'] == "link") {?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['style'] == "normal") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("font-weight: normal; text-decoration: none; font-style: normal;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['style'] == "bold") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("font-weight: bold; text-decoration: none; font-style: normal;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['style'] == "underline") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("font-weight: normal; text-decoration: underline; font-style: normal;", null, 0);?>
							<?php }?>
							<?php if ($_smarty_tpl->tpl_vars['sub_item']->value['style'] == "italic") {?>
								<?php $_smarty_tpl->tpl_vars['css_add'] = new Smarty_Variable("font-weight: normal; text-decoration: none; font-style: italic;", null, 0);?>
							<?php }?>
							<div class="x-slider-sub-item" data-top="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['top'];?>
" data-left="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['left'];?>
" data-width="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['width'];?>
" data-height="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['height'];?>
">
								<div class="context">
									<a href="<?php echo $_smarty_tpl->tpl_vars['sub_item']->value['url'];?>
" style="text-align: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['align'];?>
; font-size: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['size'];?>
px; color: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['color'];?>
; font-family: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['font'];?>
; line-height: <?php echo $_smarty_tpl->tpl_vars['sub_item']->value['lheight'];?>
px; <?php echo $_smarty_tpl->tpl_vars['css_add']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['sub_item']->value['text'];?>
</a>
								</div>
							</div>
						<?php }?>
					<?php
$_smarty_tpl->tpl_vars['sub_item'] = $__foreach_sub_item_1_saved_local_item;
}
}
if ($__foreach_sub_item_1_saved_item) {
$_smarty_tpl->tpl_vars['sub_item'] = $__foreach_sub_item_1_saved_item;
}
?>
				</div>
			<?php
$_smarty_tpl->tpl_vars['slider'] = $__foreach_slider_0_saved_local_item;
}
}
if ($__foreach_slider_0_saved_item) {
$_smarty_tpl->tpl_vars['slider'] = $__foreach_slider_0_saved_item;
}
?>
		</div>
		<div class="nav-btn">
			<span class="xbtn active"></span>
			<span class="xbtn"></span>
			<span class="xbtn"></span>
			<span class="xbtn"></span>
			<span class="xbtn"></span>
		</div>
		<div class="x-btn">
			<span class="act next"><i class="fa fa-angle-right"></i></span>
			<span class="act prev"><i class="fa fa-angle-left"></i></span>
		</div>
	</div>
<?php }
}
}
?>