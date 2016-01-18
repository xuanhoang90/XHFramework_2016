<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['logo'] = new ClassUnitLOGO();
	class ClassUnitLOGO{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "logo_link"){
						if($tmp['value'] != ""){
							$logo_link = $tmp['value'];
						}
					}
					if($tmp['name'] == "banner_image"){
						if($tmp['value'] != ""){
							$banner_image = $tmp['value'];
						}
					}
				}
			}else{
				$banner_image = "";
				$logo_link = "";
			}
			$output =<<<HERE
			<form class="form-horizontal">
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="image">Image: </label>
					<div class="col-md-9">
						<input type="hidden" class="image-src" name="banner_image" value="{$banner_image}" />
						<img class="image-preview" src="{$banner_image}" alt="Banner background"/>
						<a class="image-select x-attachment-select-one" href="#" data-toggle="modal" data-target="#window-attachment-quickaccess"><i class="fa fa-photo"></i> Select image</a>
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="logo_link">Link: </label>
					<div class="col-md-9">
						<input type="text" class="form-control logo_link link-preview" name="logo_link" placeholder="Logo link" value="{$logo_link}" />
						<a class="object-select" data="all" href="#" data-toggle="modal" data-target="#window-object-quickaccess"><i class="fa fa-chain"></i> Select from object</a>
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
						if($tmp['name'] == "logo_link"){
							if($tmp['value'] != ""){
								$logo_link = $tmp['value'];
							}
						}
						if($tmp['name'] == "banner_image"){
							if($tmp['value'] != ""){
								$banner_image = $tmp['value'];
							}
						}
					}
				}else{
					$logo_link = "";
					$banner_image = "";
				}
				$data = array(
					"logo_link" => $logo_link,
					"banner_image" => $banner_image,
				);
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.logo", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
	}
?>