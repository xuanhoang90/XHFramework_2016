<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['slider'] = new ClassUnitSlider();
	class ClassUnitSlider{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "slider_name"){
						$slider_name = $tmp['value'];
					}
					if($tmp['name'] == "slider_id"){
						$slider_id = $tmp['value'];
					}
				}
			}else{
				$slider_name = "Select slider";
				$slider_id = "";
			}
			$output =<<<HERE
			<form>
				<div class="block-title row form-group">
					<label class="control-label col-md-3" for="menu_select">Select slider: </label>
					<div class="col-md-9">
						<p class="name-preview menu-slider-name">{$slider_name}</p>
						<input type="hidden" class="slider_name_input" name="slider_name" value="{$slider_name}" />
						<input type="hidden" class="slider_id_input" name="slider_id" value="{$slider_id}" />
						<a class="object-select menu-slider-select" href="#" data-toggle="modal" data-target="#window-slider-quickaccess"><i class="fa fa-desktop"></i> Select slider</a>
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
						if($tmp['name'] == "slider_name"){
							$slider_name = $tmp['value'];
						}
						if($tmp['name'] == "slider_id"){
							$slider_id = $tmp['value'];
						}
					}
				}else{
					$slider_name = "Select slider";
					$slider_id = "";
				}
				$data = array(
					"slider_name" => $slider_name,
					"slider_id" => $slider_id,
					"slider_data" => $this->LoadSliderData($slider_id),
				);
				//echo "<pre>";print_r($data['slider_data']);exit;
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.slider", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
		public function LoadSliderData($id){
			global $CMS, $DB;
			if($id){
				$DB->query("use ".WEBSITE_DBNAME);
				$sql = $DB->query("SELECT * FROM slider WHERE id='{$id}'");
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