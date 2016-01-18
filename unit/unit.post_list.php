<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['post_list'] = new ClassUnitPostList();
	class ClassUnitPostList{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "post_type"){
						$post_type = $tmp['value'];
					}
					if($tmp['name'] == "object_name"){
						$object_name = $tmp['value'];
					}
					if($tmp['name'] == "object_link"){
						$object_link = $tmp['value'];
					}
					if($tmp['name'] == "object_id"){
						$object_id = $tmp['value'];
					}
					if($tmp['name'] == "post_number"){
						$post_number = $tmp['value'];
					}
				}
			}else{
				$post_type = "all";
				$object_name = "Object name";
				$object_link = "";
				$object_id = "";
				$post_number = 10;
			}
			$output =<<<HERE
			<form class="form-horizontal">
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="post_type">Kiểu bài viết: </label>
					<div class="col-md-9">
						<select name="post_type" class="form-control post_type x-module-post">
							<option value="newest">--Select--</option>
							<option value="newest">Bài viết mới nhất</option>
							<option value="most_view">Bài viết xem nhiều</option>
							<option value="newest_all">Bài viết mới nhất (Tất cả)</option>
							<option value="most_view_all">Bài viết xem nhiều (Tất cả)</option>
						</select>
						<script>
							$(function(){
								$(".x-module-post").find("option").each(function(){
									var _ThisVal = $(this).attr("value");
									if(_ThisVal == "{$post_type}"){
										$(this).attr({"selected":"selected"});
									}
								})
								if("{$post_type}" == "newest_all" || "{$post_type}" == "most_view_all"){
									$(".x-module-post-select-cat").hide();
								}
								$(".x-module-post").change(function(){
									var _NewOption = $(this).val();
									if(_NewOption == "newest_all" || _NewOption == "most_view_all"){
										$(".x-module-post-select-cat").fadeOut();
									}else{
										$(".x-module-post-select-cat").fadeIn();
									}
								})
							})
						</script>
					</div>
				</div>
				<div class="block-title row form-group x-module-post-select-cat">
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
					<label class="control-label col-md-3" for="post_number">Số lượng: </label>
					<div class="col-md-9">
						<input type="number" class="form-control post-number" name="post_number" placeholder="Post number" value="{$post_number}" />
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
						if($tmp['name'] == "post_type"){
							$post_type = $tmp['value'];
						}
						if($tmp['name'] == "object_name"){
							$object_name = $tmp['value'];
						}
						if($tmp['name'] == "object_link"){
							$object_link = $tmp['value'];
						}
						if($tmp['name'] == "object_id"){
							$object_id = $tmp['value'];
						}
						if($tmp['name'] == "post_number"){
							$post_number = $tmp['value'];
						}
					}
				}else{
					$post_type = "";
					$object_name = "";
					$object_link = "";
					$object_id = "";
					$post_number = 10;
				}
				$data['object_name'] = $object_name;
				$data['object_link'] = $object_link;
				$data['postlist'] = $CMS->object_data->LoadPostList($post_type, $object_id, $post_number);
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.post_list", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
	}
?>