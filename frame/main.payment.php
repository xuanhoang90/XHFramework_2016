<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->frame['payment'] = new ClassFramePayment();
	class ClassFramePayment{
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