<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->frame['register'] = new ClassFrameRegister();
	class ClassFrameRegister{
		public function Start($fData = false){
			global $CMS, $DB;
			if($fData){
				if($fData['type'] == "post-content"){
					$content = $this->LoadPostContent($fData['id']);
				}else{
					$content = $fData['content'];
				}
			}else{
				$content = "";
			}
			$output = "";
			$CMS->tpl->data = array(
				"content" => $content,
			);
			$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/main.register", false);
			$output = $tmp;
			return $output;
		}
		public function LoadPostContent($id){
			global $CMS, $DB;
			$DB->query("use ".WEBSITE_DBNAME);
			$sql = $DB->query("SELECT content FROM object_description WHERE object_id='{$id}' AND lang_id='1' ");
			if($data = $sql->fetchAll()){
				return $data[0]['content'];
			}else{
				return;
			}
		}
		public function Setting(){
			global $CMS, $DB;
			$output = "";
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-4" for="frame_setting_checkbox">Điều khoản sử dụng</label>
					<div class="col-md-8">
						<p class="radio-button btn-post-content" style="display: inline-block !important; float: left; clear: none; margin: 5px;"><input class="frame_setting_checkbox" name="frame_setting_checkbox" checked="true" type="radio" value="post-content"> Use post content</p>
						<p class="radio-button btn-custom-html" style="display: inline-block !important; float: left; clear: none; margin: 5px;"><input class="frame_setting_checkbox" name="frame_setting_checkbox" type="radio" value="custom-html"> Use custom html</p>
					</div>
				</div>
				<div class="block-title row form-group x-setting-frame post-content" id="post-content" style="display: none;">
					<label class="control-label col-md-1" for=""></label>
					<div class="col-md-10">
						<div class="post-content">
							<p>Select post to display the content</p>
						</div>
						<a class="change-post-content" data="post" href="#" data-toggle="modal" data-target="#window-object-quickaccess"><i class="fa fa-chain"></i> Select post</a>
					</div>
				</div>
				<div class="block-title row form-group x-setting-frame post-content" id="custom-html" style="display: none;">
					<label class="control-label col-md-1" for=""></label>
					<div class="col-md-10">
						<textarea name="x-about-us-editor" id="x-about-us-editor" rows="10" cols="80"></textarea>
						<script>
							$(function(){
								CKEDITOR.replace( 'x-about-us-editor' );
								CKEDITOR.instances['x-about-us-editor'].on('change', function() {
									$("#x-about-us-editor").html(CKEDITOR.instances['x-about-us-editor'].getData());
								});
								CKEDITOR.config.title = false;
							})
						</script>
						<a class="html-content-add-image x-attachment-select-multi" href="#" data-toggle="modal" data-target="#window-attachment-quickaccess"><i class="fa fa-file-image-o"></i> Add image</a>
					</div>
				</div>
			</form>
			<script>
				$(function(){
					var _SettingPostContent = function(data){
						$(".btn-post-content").click();
						$("#post-content").attr({"data": JSON.stringify(data)});
						$.ajax({
							method: "POST",
							url: "{$CMS->vars['root_domain']}?site=admin&page=edit_tpl&action=ajax&sub_act=load_post_content",
							data: { post_id: data.id },
						}).done(function( _data ) {
							$("#post-content").find(".post-content").html(_data);
						});
					}
					var _SettingCustomHTML = function(data){
						$(".btn-custom-html").click();
						CKEDITOR.instances['x-about-us-editor'].setData(data.content);
					}
					$(document).on("click",".mainblock .fa-wrench", function(e){
						e.preventDefault();
						if($(".mainblock").attr("data")){
							var _DataSetting = JSON.parse($(".mainblock").attr("data"));
							switch(_DataSetting.type){
								case 'post-content':
									_SettingPostContent(_DataSetting);
									break;
								case 'custom-html':
									_SettingCustomHTML(_DataSetting);
									break;
								default: break;
							}
						}else{
							var _SettingCheckbox = $('.frame_setting_checkbox:checked').val();
							$(".x-setting-frame").hide();
							$("#"+_SettingCheckbox).show();
						}
					})
					$(".frame_setting_checkbox").change(function(){
						_SettingCheckbox = $('.frame_setting_checkbox:checked').val();
						$(".x-setting-frame").hide();
						$("#"+_SettingCheckbox).show();
					})
					$(document).on("click", ".change-post-content", function(e){
						e.preventDefault();
						$("#window-object-quickaccess").find(".x-custom-action").addClass("x-contact-customize-select-post");
					})
					$(document).on("click", "#window-object-quickaccess .x-contact-customize-select-post", function(e){
						e.preventDefault();
						$("#window-object-quickaccess").find(".x-custom-action").removeClass("x-contact-customize-select-post");
						var _ObjectID = $("#window-object-quickaccess").find(".contain-scroll").find(".selected").attr("data");
						var _ObjectName = $("#window-object-quickaccess").find(".contain-scroll").find(".selected").find(".o-name").html();
						var _ObjectLink = $("#window-object-quickaccess").find(".contain-scroll").find(".selected").find(".o-name").attr("data");
						var _ObjectData = {
							type: "post-content",
							id: _ObjectID,
							name: _ObjectName,
							link: _ObjectLink,
						};
						$("#post-content").attr({"data": JSON.stringify(_ObjectData)});
						$.ajax({
							method: "POST",
							url: "{$CMS->vars['root_domain']}?site=admin&page=edit_tpl&action=ajax&sub_act=load_post_content",
							data: { post_id: _ObjectID },
						}).done(function( data ) {
							$("#post-content").find(".post-content").html(data);
						});
					})
					$(document).on("click", "#frameconfig .apply-selected", function(e){
						e.preventDefault();
						_SettingCheckbox = $('.frame_setting_checkbox:checked').val();
						if(_SettingCheckbox == "post-content"){
							var _Data = $("#post-content").attr("data");
							$(".mainblock").attr({"data":_Data});
						}
						if(_SettingCheckbox == "custom-html"){
							var _EditorContent = {
								type: "custom-html",
								content: CKEDITOR.instances['x-about-us-editor'].getData(),
							};
							$(".mainblock").attr({"data": JSON.stringify(_EditorContent)});
						}
					})
					$(document).on("click", ".html-content-add-image", function(e){
						e.preventDefault();
						$("#window-attachment-quickaccess").find(".x-custom-action").addClass("x-contact-customize-html-add-image");
					})
					$(document).on("click", "#window-attachment-quickaccess .x-contact-customize-html-add-image", function(e){
						e.preventDefault();
						$("#window-attachment-quickaccess").find(".x-custom-action").removeClass("x-contact-customize-html-add-image");
						var _PicturesSelected = $("#x-attachment-list-selected-tmp-data").val();
						_PicturesSelected = _PicturesSelected.split(",");
						var _DataExtend = "";
						_PicturesSelected.forEach(function(entry){
							if(entry != ""){
								//set element <img/> -> add to x-about-us-editor
								_DataExtend += '<img src="'+entry+'" alt="'+entry+'" />';
							}
						})
						//find x-about-us-editor active
						var _CurrentLangId = $(".object_editor_lang_selected").val();
						var _EditorContent = CKEDITOR.instances['x-about-us-editor'].getData();
						//return value to x-about-us-editor 
						CKEDITOR.instances['x-about-us-editor'].setData(_EditorContent + _DataExtend);
					})
				})
			</script>
HERE;
			return $output;
		}
	}
?>