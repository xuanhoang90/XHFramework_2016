<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['user_area'] = new ClassUnitUserArea();
	class ClassUnitUserArea{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="show_company">No setting</label>
				</div>
			</form>
HERE;
			return $output;
		}
		public function ReloadBlock($data){
			global $CMS, $DB, $USER;
			if($data){
				$Data = $data;
				$data = array(
					"is_logined" => $USER->info['is_login'],
					"display_name" => $USER->info['user_name'],
				);
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.user_area", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
	}
?>