<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['post_category'] = new ClassUnitPostCategory();
	class ClassUnitPostCategory{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "object_name"){
						$object_name = $tmp['value'];
					}
					if($tmp['name'] == "object_link"){
						$object_link = $tmp['value'];
					}
					if($tmp['name'] == "object_id"){
						$object_id = $tmp['value'];
					}
					if($tmp['name'] == "post_show_sub_object"){
						$post_show_sub_object = $tmp['value'];
					}
					if($tmp['name'] == "number_of_post"){
						$number_of_post = $tmp['value'];
					}
				}
			}else{
				$object_name = "Object name";
				$object_link = "";
				$object_id = "";
				$post_show_sub_object = "";
				$number_of_post = 10;
			}
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="post_cat">Post category: </label>
					<div class="col-md-9">
						<p class="name-preview">{$object_name}</p>
						<input type="hidden" class="object-name" name="object_name" value="{$object_name}" />
						<input type="hidden" class="object-link" name="object_link" value="{$object_link}" />
						<input type="hidden" class="object-id" name="object_id" value="{$object_id}" />
						<a class="object-select" data="postcat" href="#" data-toggle="modal" data-target="#window-object-quickaccess"><i class="fa fa-chain"></i> Select category</a>
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="post_show_sub_object">Show sub object: </label>
					<div class="col-md-9">
HERE;
				if($post_show_sub_object == 'yes'){
					$output.=<<<HERE
						<p class="radio-button"><input class="post_show_sub_object" name="post_show_sub_object" checked="true" type="radio" value="yes"> List post</p>
						<p class="radio-button"><input class="post_show_sub_object" name="post_show_sub_object" type="radio" value="no"> List sub category</p>
HERE;
				}else{
					$output.=<<<HERE
						<p class="radio-button"><input class="post_show_sub_object" name="post_show_sub_object" type="radio" value="yes"> List post</p>
						<p class="radio-button"><input class="post_show_sub_object" name="post_show_sub_object" checked="true" type="radio" value="no"> List sub category</p>
HERE;
				}
				$output.=<<<HERE
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="number_of_post">Number of posts: </label>
					<div class="col-md-9">
						<input type="number" class="form-control number_of_post" name="number_of_post" placeholder="Number of posts" value="{$number_of_post}" />
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
						if($tmp['name'] == "object_name"){
							$object_name = $tmp['value'];
						}
						if($tmp['name'] == "object_link"){
							$object_link = $tmp['value'];
						}
						if($tmp['name'] == "object_id"){
							$object_id = $tmp['value'];
						}
						if($tmp['name'] == "post_show_sub_object"){
							$post_show_sub_object = $tmp['value'];
						}
						if($tmp['name'] == "number_of_post"){
							$number_of_post = $tmp['value'];
						}
					}
				}else{
					$object_name = "";
					$object_link = "";
					$object_id = "";
					$post_show_sub_object = "";
					$number_of_post = 10;
				}
				$data = array(
					"object_name" => $object_name,
					"object_link" => $object_link,
					"object_id" => $object_id,
					"post_show_sub_object" => $post_show_sub_object,
					"number_of_post" => $number_of_post,
					"listdata" => $CMS->object_data->LoadSubObject($post_show_sub_object, $object_id, $number_of_post),
				);
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.post_category", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
	}
?>