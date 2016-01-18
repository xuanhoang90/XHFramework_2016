<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['menu'] = new ClassUnitMenu();
	class ClassUnitMenu{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "menu_name"){
						$menu_name = $tmp['value'];
					}
					if($tmp['name'] == "menu_id"){
						$menu_id = $tmp['value'];
					}
				}
			}else{
				$menu_name = "Select menu";
				$menu_id = "";
			}
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="menu_select">Select menu: </label>
					<div class="col-md-9">
						<p class="name-preview menu-slider-name">{$menu_name}</p>
						<input type="hidden" class="menu_name_input" name="menu_name" value="{$menu_name}" />
						<input type="hidden" class="menu_id_input" name="menu_id" value="{$menu_id}" />
						<a class="object-select menu-slider-select" href="#" data-toggle="modal" data-target="#window-menu-quickaccess"><i class="fa fa-location-arrow"></i> Select menu</a>
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
						if($tmp['name'] == "menu_name"){
							$menu_name = $tmp['value'];
						}
						if($tmp['name'] == "menu_id"){
							$menu_id = $tmp['value'];
						}
					}
				}else{
					$menu_name = "Select menu";
					$menu_id = "";
				}
				$data = array(
					"menu_name" => $menu_name,
					"menu_id" => $menu_id,
					"menu_data" => $this->LoadMenuData($menu_id),
				);
				//echo "<pre>";print_r($data['menu_data']);exit;
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.menu", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
		public function LoadMenuData($id){
			global $CMS, $DB;
			if($id){
				$DB->query("use ".WEBSITE_DBNAME);
				$sql = $DB->query("SELECT * FROM menu WHERE id='{$id}'");
				if($data = $sql->fetchAll()){
					return unserialize($data[0]['data']);
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}
?>