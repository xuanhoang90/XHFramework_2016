<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['banner'] = new ClassUnitBanner();
	class ClassUnitBanner{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "banner_html"){
						if($tmp['value'] != ""){
							$banner_html = $tmp['value'];
						}
					}
					if($tmp['name'] == "banner_image"){
						if($tmp['value'] != ""){
							$banner_image = $tmp['value'];
						}
					}
					if($tmp['name'] == "banner_link"){
						if($tmp['value'] != ""){
							$banner_link = $tmp['value'];
						}
					}
				}
			}else{
				$banner_html = "";
				$banner_image = "";
				$banner_link = "";
			}
			$output =<<<HERE
			<form class="form-horizontal">
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="banner_image">Background image: </label>
					<div class="col-md-9">
						<input type="hidden" class="image-src" name="banner_image" value="{$banner_image}" />
						<img class="image-preview" src="{$banner_image}" alt="Banner background"/>
						<a class="image-select x-attachment-select-one" href="#" data-toggle="modal" data-target="#window-attachment-quickaccess"><i class="fa fa-photo"></i> Select image</a>
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="banner_link">Background link: </label>
					<div class="col-md-9">
						<input type="text" class="form-control banner_link link-preview" name="banner_link" placeholder="Banner link" value="{$banner_link}" />
						<a class="object-select" data="all" href="#" data-toggle="modal" data-target="#window-object-quickaccess"><i class="fa fa-chain"></i> Select from object</a>
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="banner_html">Custom HTML: </label>
					<div class="col-md-9">
						<textarea name="banner_html" id="banner_html" rows="10" cols="80">{$banner_html}</textarea>
						<script>
							$(function(){
								CKEDITOR.replace( 'banner_html' );
								CKEDITOR.instances['banner_html'].on('change', function() {
									$("#banner_html").html(CKEDITOR.instances['banner_html'].getData());
								});
								CKEDITOR.config.title = false;
							})
						</script>
					</div>
				</div>
			</form>
HERE;
			return $output;
		}
		public function ReloadBlock($data){
			global $CMS, $DB;
			if($data){
				$Data = $data;
				if($Data['moduleData'] != ""){
					$DefaultData = $Data['moduleData'];
					foreach($DefaultData as $tmp){
						if($tmp['name'] == "banner_html"){
							if($tmp['value'] != ""){
								$banner_html = $tmp['value'];
							}
						}
						if($tmp['name'] == "banner_image"){
							if($tmp['value'] != ""){
								$banner_image = $tmp['value'];
							}
						}
						if($tmp['name'] == "banner_link"){
							if($tmp['value'] != ""){
								$banner_link = $tmp['value'];
							}
						}
					}
				}else{
					$banner_html = "";
					$banner_image = "";
					$banner_link = "";
				}
				$data = array(
					"banner_html" => $banner_html,
					"banner_image" => $banner_image,
					"banner_link" => $banner_link,
				);
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.banner", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
	}
?>