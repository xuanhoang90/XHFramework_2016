<?php /* Smarty version 3.1.28-dev/54, created on 2016-01-15 12:21:13
         compiled from "C:\xampp\htdocs\mtb\themes\tpl-01\main.contact.tpl" */ ?>
<?php
/*%%SmartyHeaderCode:10933569881c9b2c225_83258914%%*/
$_valid = $_smarty_tpl->decodeProperties(array (
  'has_nocache_code' => false,
  'version' => '3.1.28-dev/54',
  'unifunc' => 'content_569881c9b3faa0_47570999',
  'file_dependency' => 
  array (
    '3675bbbe311925575da6fe01a538f1cfc9418958' => 
    array (
      0 => 'C:\\xampp\\htdocs\\mtb\\themes\\tpl-01\\main.contact.tpl',
      1 => 1452486471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
  'isChild' => false,
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_569881c9b3faa0_47570999')) {
function content_569881c9b3faa0_47570999 ($_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '10933569881c9b2c225_83258914';
if ($_smarty_tpl->tpl_vars['show_ggmap']->value == "yes") {?>
	<div id="googleMap" style="width: auto;height:500px;"></div>
	<?php echo '<script'; ?>
 src="http://maps.googleapis.com/maps/api/js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>
		function initialize(){
		  var mapProp = {
			center:new google.maps.LatLng(<?php echo $_smarty_tpl->tpl_vars['ggmap_lat']->value;?>
,<?php echo $_smarty_tpl->tpl_vars['ggmap_log']->value;?>
),
			zoom:<?php echo $_smarty_tpl->tpl_vars['ggmap_zoom']->value;?>
,
			mapTypeId:google.maps.MapTypeId.ROADMAP
		  };
		  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
		}
		google.maps.event.addDomListener(window, 'load', initialize);
	<?php echo '</script'; ?>
>
<?php }?>
<?php if ($_smarty_tpl->tpl_vars['show_ctform']->value == "yes") {?>
	<div class="contact-form">
		<?php if ($_smarty_tpl->tpl_vars['contact_info']->value) {?>
			<div class="contact-info">
				<h1>Contact</h1>
				<div>
					<p>Company: <?php echo $_smarty_tpl->tpl_vars['contact_info']->value['company'];?>
</p>
					<p>Email: <?php echo $_smarty_tpl->tpl_vars['contact_info']->value['email'];?>
</p>
					<p>Hotline: <?php echo $_smarty_tpl->tpl_vars['contact_info']->value['phone'];?>
</p>
				</div>
			</div>
		<?php }?>
		<form method="post">
			<div class="row form-group">
				<label class="control-label col-md-4" for="g_name">Your name: </label>
				<div class="col-md-8">
					<input type="text" class="form-control g_name" name="g_name" placeholder="Your name" value="" />
				</div>
			</div>
			<div class="row form-group">
				<label class="control-label col-md-4" for="g_email">Your email: </label>
				<div class="col-md-8">
					<input type="text" class="form-control g_email" name="g_email" placeholder="Your email" value="" />
				</div>
			</div>
			<div class="row form-group">
				<label class="control-label col-md-4" for="g_title">Title: </label>
				<div class="col-md-8">
					<input type="text" class="form-control g_title" name="g_title" placeholder="Title" value="" />
				</div>
			</div>
			<div class="row form-group">
				<label class="control-label col-md-4" for="g_content">Content: </label>
				<div class="col-md-8">
					<textarea name="editor" id="editor" style="width: 100%;" placeholder="Content"></textarea>
				</div>
			</div>
			<input type="submit" name="submit" value="Send" />
		</form>
	</div>
<?php }
}
}
?>