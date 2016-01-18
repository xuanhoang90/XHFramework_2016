<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->frame['contact'] = new ClassFrameContact();
	class ClassFrameContact{
		public function Start($fData = false){
			global $CMS, $DB;
			$this->CheckContact();
			if($fData){
				$ggmap = $fData['ggmap'];
				$lat = $fData['lat'];
				$log = $fData['log'];
				$zoom = $fData['zoom'];
				$ctform = $fData['ctform'];
			}else{
				$ggmap = "";
				$lat = "";
				$log = "";
				$zoom = "";
				$ctform = "";
			}
			$output = "";
			$CMS->tpl->data = array(
				"contact_info" => $this->LoadContactInfo(),
				"show_ggmap" => $ggmap,
				"ggmap_lat" => $lat,
				"ggmap_log" => $log,
				"ggmap_zoom" => $zoom,
				"show_ctform" => $ctform,
			);
			$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/main.contact", false);
			$output = $tmp;
			return $output;
		}
		public function LoadContactInfo(){
			global $CMS, $DB;
			$DB->query("use ".WEBSITE_DBNAME);
			$sql = $DB->query("SELECT * FROM config WHERE `key`='config_info'");
			if($data = $sql->fetchAll()){
				return unserialize($data[0]['value']);
			}else{
				return false;
			}
		}
		public function Setting(){
			global $CMS, $DB;
			$output = "";
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-1" for="contact_show_gg_map"></label>
					<div class="col-md-11">
						<div class='checkbox checkbox-info checkbox-circle'>
							<input type="checkbox" checked="" id="contact_show_gg_map" name="contact_show_gg_map" class="contact_show_gg_map"><label for="contact_show_gg_map"> Show google map</label>
						</div>
					</div>
				</div>
				<div class="block-title row form-group x-setting-frame display-ggmap" id="display-ggmap" style="display: none;">
					<label class="control-label col-md-1" for="gg_lat_input"></label>
					<div class="col-md-10">
						<p class="label">Latitude: </p>
						<input type="text" class="form-control gg_lat_input" name="gg_lat_input" placeholder="Latitude" value="" />
						<p class="label">Longitude: </p>
						<input type="text" class="form-control gg_log_input" name="gg_log_input" placeholder="Longitude" value="" />
						<p class="label">Zoom: </p>
						<input type="text" class="form-control gg_zoom_input" name="gg_zoom_input" placeholder="Zoom" value="" />
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-1" for="contact_show_form"></label>
					<div class="col-md-11">
						<div class='checkbox checkbox-info checkbox-circle'>
							<input type="checkbox" checked="" id="contact_show_form" name="contact_show_form" class="contact_show_form"><label for="contact_show_form"> Show contact form</label>
						</div>
					</div>
				</div>
			</form>
			<script>
				$(function(){
					var _StartupSettingFrame = function(data){
						if(data.ggmap == "yes"){
							$("#contact_show_gg_map").prop("checked", true).change();
						}else{
							$("#contact_show_gg_map").prop("checked", false).change();
						}
						if(data.ctform == "yes"){
							$("#contact_show_form").prop("checked", true).change();
						}else{
							$("#contact_show_form").prop("checked", false).change();
						}
						$(".gg_lat_input").val(data.lat);
						$(".gg_log_input").val(data.log);
						$(".gg_zoom_input").val(data.zoom);
					}
					var _StartupWithNoSetting = function(){
						$("#contact_show_gg_map").prop("checked", false).change();
						$("#contact_show_form").prop("checked", false).change();
					}
					$(document).on("click",".mainblock .fa-wrench", function(e){
						e.preventDefault();
						if($(".mainblock").attr("data")){
							var _DataSetting = JSON.parse($(".mainblock").attr("data"));
							_StartupSettingFrame(_DataSetting);
						}else{
							_StartupWithNoSetting();
						}
					})
					$("#contact_show_gg_map").change(function(){
						if($(this).prop("checked")){
							$("#display-ggmap").slideDown();
						}else{
							$("#display-ggmap").slideUp();
						}
					})
					$(document).on("click", "#frameconfig .apply-selected", function(e){
						e.preventDefault();
						$("#frameconfig").fadeOut();
						if($("#contact_show_gg_map").prop("checked")){
							var _ShowGgMap = "yes";
							var _Lat = $(".gg_lat_input").val();
							var _Log = $(".gg_log_input").val();
							var _Zoom = $(".gg_zoom_input").val();
						}else{
							var _ShowGgMap = "no";
							var _Lat = "0";
							var _Log = "0";
							var _Zoom = "0";
						}
						if($("#contact_show_form").prop("checked")){
							var _ShowCtForm = "yes";
						}else{
							var _ShowCtForm = "no";
						}
						var _SettingData = {
							ggmap: _ShowGgMap,
							lat: _Lat,
							log: _Log,
							zoom: _Zoom,
							ctform: _ShowCtForm,
						};
						$(".mainblock").attr({"data": JSON.stringify(_SettingData)});
					})
				})
			</script>
HERE;
			return $output;
		}
		public function CheckContact(){
			global $CMS, $DB;
			if($CMS->input['g_name'] != '' && $CMS->input['g_email'] != '' && $CMS->input['editor'] != ''){
				$DB->query("use ".WEBSITE_DBNAME);
				$DB->query("INSERT INTO `contact`(`from_name`, `from_email`, `title`, `content`) VALUES ('{$CMS->input['g_name']}', '{$CMS->input['g_email']}', '{$CMS->input['g_title']}', '{$CMS->input['editor']}') ");
				// echo "INSERT INTO contact('from_name', 'from_email', 'title', 'content') VALUES ('{$CMS->input['g_name']}', '{$CMS->input['g_email']}', '{$CMS->input['g_title']}', '{$CMS->input['editor']}') ";exit;
				return true;
			}
			return false;
		}
	}
?>