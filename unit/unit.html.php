<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->unit['html'] = new ClassUnitHTML();
	class ClassUnitHTML{
		public function GetBlockSetting($data){
			global $CMS, $DB;
			$output = "";
			if($data != ""){
				$DefaultData = $data;
				foreach($DefaultData as $tmp){
					if($tmp['name'] == "editor"){
						$tmp2 = $tmp['value'];
					}
				}
				$DefaultData = $tmp2;
			}else{
				$DefaultData = "HTML";
			}
			$output =<<<HERE
			<form>
				<textarea name="editor" id="editor" rows="10" cols="80">{$DefaultData}</textarea>
				<script>
					$(function(){
						CKEDITOR.replace( 'editor' );
						CKEDITOR.instances['editor'].on('change', function() {
							$("#editor").html(CKEDITOR.instances['editor'].getData());
						});
						CKEDITOR.config.title = false;
					})
				</script>
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
						if($tmp['name'] == "editor"){
							$tmp2 = $tmp['value'];
						}
					}
					$DefaultData = $tmp2;
				}else{
					$DefaultData = "";
				}
				$data = array(
					"html" => $DefaultData,
				);
				$CMS->tpl->data = $data;
				$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/block.html", false);
				$output = $tmp;
			}else{
				$output = "";
			}
			return $output;
		}
	}
?>