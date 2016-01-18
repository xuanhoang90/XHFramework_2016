<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['comment'] = new ClassUnitComment();
	class ClassUnitComment{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "number_of_cmt"){
						$number_of_cmt = $tmp['value'];
					}
					if($tmp['name'] == "show_text_area"){
						$show_text_area = $tmp['value'];
					}
				}
			}else{
				$number_of_cmt = 10;
				$show_text_area = "yes";
			}
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="number_of_cmt">Number display: </label>
					<div class="col-md-9">
						<input type="number" class="form-control number_of_cmt" name="number_of_cmt" placeholder="Number of comments" value="{$number_of_cmt}" />
					</div>
				</div>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="show_text_area">Show text area: </label>
					<div class="col-md-9">
HERE;
				if($show_text_area == 'yes'){
					$output.=<<<HERE
						<p class="radio-button"><input class="show-text-area" name="show_text_area" checked="true" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show-text-area" name="show_text_area" type="radio" value="no"> No</p>
HERE;
				}else{
					$output.=<<<HERE
						<p class="radio-button"><input class="show-text-area" name="show_text_area" type="radio" value="yes"> Yes</p>
						<p class="radio-button"><input class="show-text-area" name="show_text_area" checked="true" type="radio" value="no"> No</p>
HERE;
				}
			$output.=<<<HERE
					</div>
				</div>
			</form>
HERE;
			return $output;
		}
		public function ReloadBlock($data){
			global $CMS, $DB, $USER;
			if($CMS->input['site'] != "post"){return ""; }
			if($data){
				$Data = $data;
				if($Data['moduleData'] != ""){
					$DefaultData = $Data['moduleData'];
					foreach($DefaultData as $tmp){
						if($tmp['name'] == "number_of_cmt"){
							$number_of_cmt = $tmp['value'];
						}
						if($tmp['name'] == "show_text_area"){
							$show_text_area = $tmp['value'];
						}
					}
				}else{
					$number_of_cmt = 10;
					$show_text_area = "yes";
				}
				if($USER->info['is_login']){
					$logined = true;
				}else{
					$logined = true;
				}
				$data = array(
					"list_comment" => $this->LoadListComment(),
					"number_of_cmt" => $number_of_cmt,
					"show_text_area" => $show_text_area,
					"is_logined" => $USER->info['is_login'],
					"user_data" => $USER->info['data'],
				);
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.comment", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
		public function GetComment($id = false){
			global $CMS, $DB;
			$DB->query("use ".WEBSITE_DBNAME);
			$sql = $DB->query("SELECT * FROM comment WHERE object_id='{$id}' LIMIT 0,10 ");
			if($data = $sql->fetchAll()){
				return $data;
			}else{
				return false;
			}
		}
		public function LoadListComment(){
			global $CMS, $DB;
			if($CMS->input['post'] != ""){
				$DB->query("use ".WEBSITE_DBNAME);
				$sql = $DB->query("SELECT o.id FROM object o,object_description od WHERE o.id=od.object_id AND od.lang_id='1' AND 1=1 AND o.type='3' AND o.delete='0' AND od.nice_url='{$CMS->input['post']}'");
				if($data = $sql->fetchAll()){
					return $this->GetComment($data[0]['id']);
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}
?>