<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->frame['post'] = new ClassFramePost();
	class ClassFramePost{
		public function Start($fData = false){
			global $CMS, $DB;
			if($fData){
				$brc = $fData['brc'];
				$soc = $fData['soc'];
			}else{
				$brc = "";
				$soc = "";
			}
			$output = "";
			$data['notfound'] = "false";
			if(!$tmp = $CMS->object_data->GetPostDetail()){
				$data['notfound'] = "true";
			}else{
				$data['post_detail'] = $tmp[0];
			}
			$data['show_brc'] = $brc;
			$data['show_soc'] = $soc;
			$CMS->tpl->data = $data;
			$output = $CMS->tpl->Display($CMS->vars['tpl_name']."/main.post_view", false);
			return $output;
		}
		public function Setting(){
			global $CMS, $DB;
			$output = "";
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-1" for="post_display_breadcrumb"></label>
					<div class="col-md-11">
						<div class='checkbox checkbox-info checkbox-circle'>
							<input type="checkbox" checked="" id="post_display_breadcrumb" name="post_display_breadcrumb" class="post_display_breadcrumb"><label for="post_display_breadcrumb"> Show Breadcrumb</label>
						</div>
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-1" for="post_display_social"></label>
					<div class="col-md-11">
						<div class='checkbox checkbox-info checkbox-circle'>
							<input type="checkbox" checked="" id="post_display_social" name="post_display_social" class="post_display_social"><label for="post_display_social"> Show social like, share button</label>
						</div>
					</div>
				</div>
			</form>
			<script>
				$(function(){
					var _StartupSettingFrame = function(data){
						if(data.brc == "yes"){
							$("#post_display_breadcrumb").prop("checked", true).change();
						}else{
							$("#post_display_breadcrumb").prop("checked", false).change();
						}
						if(data.soc == "yes"){
							$("#post_display_social").prop("checked", true).change();
						}else{
							$("#post_display_social").prop("checked", false).change();
						}
					}
					var _StartupWithNoSetting = function(){
						$("#post_display_breadcrumb").prop("checked", false).change();
						$("#post_display_social").prop("checked", false).change();
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
					$(document).on("click", "#frameconfig .apply-selected", function(e){
						e.preventDefault();
						$("#frameconfig").fadeOut();
						if($("#post_display_breadcrumb").prop("checked")){
							var _ShowBrc = "yes";
						}else{
							var _ShowBrc = "no";
						}
						if($("#post_display_social").prop("checked")){
							var _ShowSoc = "yes";
						}else{
							var _ShowSoc = "no";
						}
						var _SettingData = {
							brc: _ShowBrc,
							soc: _ShowSoc,
						};
						$(".mainblock").attr({"data": JSON.stringify(_SettingData)});
					})
				})
			</script>
HERE;
			return $output;
		}
	}
?>