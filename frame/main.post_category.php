<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->frame['post_category'] = new ClassFramePostCategory();
	class ClassFramePostCategory{
		public function Start($fData = false){
			global $CMS, $DB;
			if($fData){
				$brc = $fData['brc'];
				$desc = $fData['desc'];
				$ppp = $fData['ppp'];
			}else{
				$brc = "";
				$desc = "";
				$ppp = "";
			}
			if($CMS->input['category']){
				$cat_data = $this->GetCatData($CMS->input['category']);
				$cat_id = $cat_data['object_id'];
				$cat_name = $cat_data['name'];
				$cat_desc = $cat_data['short_description'];
				$cat_url = $CMS->input['category'];
			}else{
				$cat_id = 0;
				$cat_name = "Root";
				$cat_url = "";
				$cat_desc = "";
			}
			$output = "";
			$CMS->tpl->data = array(
				"show_brc" => $brc,
				"show_desc" => $desc,
				"cat_name" => $cat_name,
				"cat_id" => $cat_id,
				"cat_url" => $cat_url,
				"cat_desc" => $cat_desc,
				"postlist_data" => $this->PostCategoryPostList($cat_id, $ppp),
				"catlist_data" => $this->PostCategorySubCatList($cat_id, $ppp),
				"root_domain" => $CMS->vars['root_domain'],
			);
			//echo "<pre>"; print_r($CMS->tpl->data);exit;
			$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/main.post_category", false);
			$output = $tmp;
			return $output;
		}
		public function Setting(){
			global $CMS, $DB;
			$output = "";
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-1" for="postcat_display_breadcrumb"></label>
					<div class="col-md-11">
						<div class='checkbox checkbox-info checkbox-circle'>
							<input type="checkbox" checked="" id="postcat_display_breadcrumb" name="postcat_display_breadcrumb" class="postcat_display_breadcrumb"><label for="postcat_display_breadcrumb"> Show Breadcrumb</label>
						</div>
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-1" for="postcat_display_description"></label>
					<div class="col-md-11">
						<div class='checkbox checkbox-info checkbox-circle'>
							<input type="checkbox" checked="" id="postcat_display_description" name="postcat_display_description" class="postcat_display_description"><label for="postcat_display_description"> Show category description</label>
						</div>
					</div>
				</div>
				<div class="block-title row form-group x-setting-frame">
					<label class="control-label col-md-1" for="postcat_post_perpage"></label>
					<div class="col-md-10">
						<p class="label">Number posts per page: </p>
						<input type="number" class="form-control postcat_post_perpage" name="postcat_post_perpage" placeholder="Posts per page" value="" />
					</div>
				</div>
			</form>
			<script>
				$(function(){
					var _StartupSettingFrame = function(data){
						if(data.brc == "yes"){
							$("#postcat_display_breadcrumb").prop("checked", true).change();
						}else{
							$("#postcat_display_breadcrumb").prop("checked", false).change();
						}
						if(data.desc == "yes"){
							$("#postcat_display_description").prop("checked", true).change();
						}else{
							$("#postcat_display_description").prop("checked", false).change();
						}
						$(".postcat_post_perpage").val(data.ppp);
					}
					var _StartupWithNoSetting = function(){
						$("#postcat_display_breadcrumb").prop("checked", false).change();
						$("#postcat_display_description").prop("checked", false).change();
						$(".postcat_post_perpage").val(10);
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
						if($("#postcat_display_breadcrumb").prop("checked")){
							var _ShowBrc = "yes";
						}else{
							var _ShowBrc = "no";
						}
						if($("#postcat_display_description").prop("checked")){
							var _ShowDes = "yes";
						}else{
							var _ShowDes = "no";
						}
						var _SettingData = {
							brc: _ShowBrc,
							desc: _ShowDes,
							ppp: $(".postcat_post_perpage").val(),
						};
						$(".mainblock").attr({"data": JSON.stringify(_SettingData)});
					})
				})
			</script>
HERE;
			return $output;
		}
		public function ConvertPostData($data = false){
			global $CMS, $DB;
			if($data){
				$res = array();
				foreach($data as $post){
					$tmp = "";
					$tmp['id'] = $post['id'];
					$tmp['viewed'] = $post['viewed'];
					$tmp['date_created'] = $post['date_created'];
					$tmp['image'] = $CMS->vars['root_domain']."/".$post['image'];
					$tmp['name'] = $post['name'];
					$tmp['nice_url'] = $CMS->vars['root_domain']."/post/".$post['nice_url'];
					$tmp['short_description'] = $post['short_description'];
					$tmp['content'] = $post['content'];
					array_push($res, $tmp);
				}
				return $res;
			}else{
				return false;
			}
		}
		public function ConvertCategoryData($data = false){
			global $CMS, $DB;
			if($data){
				$res = array();
				foreach($data as $post){
					$tmp = "";
					$tmp['id'] = $post['id'];
					$tmp['image'] = $CMS->vars['root_domain']."/".$post['image'];
					$tmp['name'] = $post['name'];
					$tmp['nice_url'] = $CMS->vars['root_domain']."/post_category/".$post['nice_url'];
					$tmp['short_description'] = $post['short_description'];
					array_push($res, $tmp);
				}
				return $res;
			}else{
				return false;
			}
		}
		public function ObjectCounter($parent = 0,$type = 3){//1: post cat, 3: post
			global $CMS, $DB;
			$DB->query("use ".WEBSITE_DBNAME);
			$sql = $DB->query("SELECT COUNT(*) FROM object WHERE parent LIKE '%,{$parent},%' AND type='{$type}'");
			if($data = $sql->fetchColumn()){
				return $data[0]['COUNT(*)'];
			}else{
				return false;
			}
			return;
		}
		public function PostCategoryPostList($parent = 0,$ipp = 10){
			global $CMS, $DB;
			$totalItem = $this->ObjectCounter($parent, 3);
			if(ceil($totalItem/$ipp) > 0){
				$totalPage = ceil($totalItem/$ipp);
			}else{
				$totalPage = 1;
			}
			if(intval($CMS->input['post_page']) > 0){
				$page = intval($CMS->input['post_page']);
			}else{
				$page = 1;
			}
			
			$limit_start = ($page - 1) * $ipp;
			$sql_add = " LIMIT {$limit_start}, {$ipp} ";
			$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.delete='0' AND o.type='3' AND o.parent LIKE '%,{$parent},%' ORDER BY o.id DESC {$sql_add}");
			if($data = $sql->fetchAll()){
				$tmp = $this->ConvertPostData($data);
				$res = array(
					"total_page" => $totalPage,
					"current_page" => $page,
					"list_post" => $tmp,
				);
				return $res;
			}else{
				return false;
			}
			return false;
		}
		public function PostCategorySubCatList($parent = 0, $ipp = 10){
			global $CMS, $DB;
			$totalItem = $this->ObjectCounter($parent, 1);
			if(ceil($totalItem/$ipp) > 0){
				$totalPage = ceil($totalItem/$ipp);
			}else{
				$totalPage = 1;
			}
			if(intval($CMS->input['postcat_page']) > 0){
				$page = intval($CMS->input['postcat_page']);
			}else{
				$page = 1;
			}
			
			$limit_start = ($page - 1) * $ipp;
			$sql_add = " LIMIT {$limit_start}, {$ipp} ";
			$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.delete='0' AND o.type='1' AND o.parent LIKE '%,{$parent},%' ORDER BY o.id DESC {$sql_add}");
			if($data = $sql->fetchAll()){
				$tmp = $this->ConvertCategoryData($data);
				$res = array(
					"total_page" => $totalPage,
					"current_page" => $page,
					"list_postcat" => $tmp,
				);
				return $res;
			}else{
				return false;
			}
			return false;
		}
		public function GetCatData($cat_url = ""){
			global $CMS, $DB;
			$sql = $DB->query("SELECT * FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='1' AND o.delete='0' AND od.nice_url='{$cat_url}'");
			if($data = $sql->fetchAll()){
				return $data[0];
			}else{
				return false;
			}
		}
	}
?>