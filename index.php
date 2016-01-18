<?php
	//start session
	session_start();
	
	//off error messenger
	error_reporting(1);//on = 1, off = 0
	
	//Global
	$CMS;
	$DB;
	$USER;
	$OBJECT;
	
	//access value
	define("ROOT_ACCESS",true);
	
	//timzone
	date_default_timezone_set("Asia/Ho_Chi_Minh");
    //echo date('Y-m-d H:i:s');
	
	//load core 
	$core = "core/init.inc.php";
	if(file_exists($core)){
		require($core);
	}else{
		echo "System error!!!";
	}
	exit;
?>