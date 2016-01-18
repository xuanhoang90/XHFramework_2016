<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->frame['home'] = new ClassFrameHome();
	class ClassFrameHome{
		public function Start($fData = false){
			global $CMS, $DB;
			$output = "";
			$CMS->tpl->data = array();
			$tmp = $CMS->tpl->Display($CMS->vars['tpl_name']."/main.home", false);
			$output = $tmp;
			return $output;
		}
		public function Setting(){
			global $CMS, $DB;
			$output = "";
			$output =<<<HERE
			<form>
				
HERE;
			return $output;
		}
	}
?>