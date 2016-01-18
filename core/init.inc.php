<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	//ceil 
	function ceiling($number, $significance = 1)
    {
        return ( is_numeric($number) && is_numeric($significance) ) ? (ceil($number/$significance)*$significance) : false;
    }
	
	//include system files
	function LoadSystemFile($dir){
		$files = array_diff(scandir($dir), array('..', '.'));
		if(sizeof($files)){
			foreach($files as $file){
				if (preg_match("/.php/i", $file)) {
					if(is_file($dir."/".$file)){
						echo $dir."/".$file."<br/>";
						include $dir."/".$file;
					}
				}
			}
			return;
		}else{
			return;
		}
	}
	$system = array("core","frame","unit");
	foreach($system as $sys){
		$files = array_diff(scandir($sys), array('..', '.'));
		foreach($files as $file){
			if (preg_match("/.php/i", $file)) {
				if(is_file($sys."/".$file)){
					//echo $sys."/".$file."<br/>";
					include_once $sys."/".$file;
				}
			}
		}
		foreach(glob($sys.'/*', GLOB_ONLYDIR) as $dir) {
			$s = $sys.'/'.basename($dir);
			$files = array_diff(scandir($s), array('..', '.'));
			foreach($files as $file){
				if (preg_match("/.php/i", $file)) {
					if(is_file($s."/".$file)){
						//echo $s."/".$file."<br/>";
						include_once $s."/".$file;
					}
				}
			}
		}
	}
	
	//access to register new page
	//secret key to access register page: d133d489c50faa670fda92df205f52bf
	//test link: http://mutisite.taka.com/?d133d489c50faa670fda92df205f52bf=1&domain=http://mutisite.taka.com&account_name=xuanhoang&account_pwd=xuanhoang&account_size=1000&account_type=1
	//type = gói sử dụng, ví dụ 1 tháng, 3 tháng, 5 tháng, hoặc dùng thử. tình trạng thanh toán sẽ có table khác quản lý, thêm sau
	//size: dung lượng được phép upload
	//account_ các tham số đăng ký
	if($CMS->input['d133d489c50faa670fda92df205f52bf'] && $CMS->vars['root_domain'] == "http://mtbweb.com"){
		$regis = "9de4a97425678c5b1288aa70c1669a64/index.php";
		if(file_exists($regis)){
			require($regis);
		}else{
			echo "System error!!!";
		}
		exit;
	}
	
	//Load DB
	$url_part = explode("//", $CMS->vars['root_domain']);
	$name = str_replace(".", "_", $url_part[1]);
	$db_name = "taka__".$name;
	$folder_name = "data__".$name;
	define("WEBSITE_DBNAME",$db_name);//$db_name
	define("WEBSITE_FNAME",$folder_name);
	if(!$DB->query("use ".$db_name)){
		if($CMS->vars['root_domain'] == "http://multisite.taka.com"){
			$DB->query("use ".DATABASE_SYSTEM);
		}else{
			echo "Web database not found, please contact hoangnguyen@taka.com.vn";exit;
		}
	}
	//check site
	
	if($CMS->input['site'] == "admin"){
		$admin = "admin/index.php";
		if(file_exists($admin)){
			require($admin);
		}else{
			echo "System error!!!";
		}
		exit;
	}else{
		$CMS->skin->Start();
	}
?>