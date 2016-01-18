<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	
	$ClientRequest = new ClientRequest();
	$ClientRequest->Autorun();
	//echo "<pre>";print_r($CMS->input);
	class ClientRequest{
		public function __construct(){
			return true;
		}
		public function Autorun(){
			global $CMS, $DB;
			$CMS->input = $this->AnalyticRequest();
			return true;
		}
		public function AnalyticRequest(){
			global $CMS, $DB;
			$split_url = explode("?", $_SERVER['REQUEST_URI']);
			if($split_url[1]){
				$tmp = explode("&", $split_url[1]);
				$split = array();
				foreach($tmp as $arr){
					$tmp1 = explode("=", $arr);
					$split[$tmp1[0]] = $tmp1[1];
				}
				$input = array_merge($split, $_REQUEST);
			}else{
				$input = $_REQUEST;
			}
			return $input;
		}
	}