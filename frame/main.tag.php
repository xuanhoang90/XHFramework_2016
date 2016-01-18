<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->frame['tag'] = new ClassFrameTag();
	class ClassFrameTag{
		public function Start($fData = false){
			global $CMS, $DB;
			$output = "";
			$CMS->tpl->data = array();
			$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/main.tag", false);
			$output = $tmp;
			return $output;
		}
		public function Setting(){
			global $CMS, $DB;
			$output = "";
			$output =<<<HERE
			
HERE;
			return $output;
		}
	}
?>