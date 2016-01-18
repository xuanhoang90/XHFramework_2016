<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->frame['customer'] = new ClassFrameCustomer();
	class ClassFrameCustomer{
		public function Start($fData = false){
			global $CMS, $DB;
			$output = "";
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