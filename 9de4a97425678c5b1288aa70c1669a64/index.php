<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	$CMS->M_reg = new Mutisite();
	$CMS->M_reg->Autorun();
	
	class Mutisite{
		public function __construct(){}
		public function Autorun(){
			global $CMS, $DB;
			switch($CMS->input['action']){
				case 'register_do':
					return $this->RegisterDo();
					break;
				case 'register':
					return $this->RegPage();
					break;
				default:
					return $this->RegPage();
					break;
			}
		}
		public function RegisterDo(){
			global $CMS, $DB;
			if($CMS->input['domain'] && $CMS->input['account_name'] && $CMS->input['account_pwd'] && $CMS->input['account_size'] && $CMS->input['account_type']){
				//check and create new website
				//success: echo link redirect to new website 
				//false: echo detail
			}else{
				return $this->RegPage();
				exit;
			}
			//check domain 
			if($this->CheckDomain($CMS->input['domain'])){
				//split domain 
				$url_part = explode("//", $CMS->input['domain']);
				$name = str_replace(".", "_", $url_part[1]);
				$db_name = "taka__".$name;
				$folder_name = "data__".$name;
				if(!$DB->query("use ".$db_name)){
					//ok
					if(!$this->CreateAccount($db_name, $folder_name)){
						return $this->Redirect($CMS->input['domain']);
						exit;
						echo "Error while processing. Cannot create new website"; exit;
					}else{
						return $this->Redirect($CMS->input['domain']);
						exit;
					}
				}else{
					//database exists
					return $this->Redirect($CMS->input['domain']);
					exit;
					echo "Sorry, domain exists.";exit;
				}
			}else{
				//false, return
				return $this->Redirect($CMS->input['domain']);
				exit;
				echo "Sorry, domain exists.";exit;
			}
		}
		public function RegPage(){
			global $CMS, $DB;
			$CMS->tpl->Display("secret/register");
			exit;
		}
		public function Redirect($domain = false){
			global $CMS, $DB;
			$data = array(
				"domain" => $domain
			);
			$CMS->tpl->data = $data;
			$CMS->tpl->Display("secret/redirect");
			exit;
		}
		public function CheckDomain($domain = false){
			global $CMS, $DB;
			$DB->query("use ".DATABASE_SYSTEM);
			$sql = $DB->query("SELECT * FROM web_data WHERE domain LIKE '{$domain}'");
			if($query = $sql->fetchAll()){
				//domain exists
				return false;
			}else{
				return true;
			}
		}
		public function CreateAccount($db_name = false, $folder_name = false){
			global $CMS, $DB;
			if($db_name && $folder_name){
				//add to system data
				$DB->query("use ".DATABASE_SYSTEM);
				
				$today = date('Y-m-d H:i:s');
				$acc = $CMS->input['account_name'];
				$acc_pwd = md5($CMS->input['account_pwd']);
				$acc_hint = $CMS->input['account_pwd'];
				$sql = $DB->query("INSERT INTO web_data(`id`, `domain`, `admin_name`, `admin_pwd`, `hint`, `database`, `size`, `folder`, `startdate`, `date_end`) VALUES ('','{$CMS->input['domain']}', '{$acc}', '{$acc_pwd}', '{$acc_hint}','{$db_name}','{$CMS->input['account_size']}','{$folder_name}','{$today}','')");
				//create new database
				if($DB->query("CREATE DATABASE IF NOT EXISTS `{$db_name}` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci")){
					//use new database 
					$DB->query("use ".$db_name);
					//import system table
					$DB->query("CREATE TABLE IF NOT EXISTS `admin_data` (
					`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`company` text COLLATE utf8_unicode_ci NOT NULL,
					`avatar` double NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
					INSERT INTO `admin_data` (`name`, `email`, `company`, `avatar`) VALUES
					('Xuân Hoàng', 'nevergiveup.xuanhoang@gmail.com', 'TAKA', 1)");
					$DB->query("CREATE TABLE IF NOT EXISTS `comment` (
					`id` double NOT NULL AUTO_INCREMENT,
					`object_id` double NOT NULL,
					`parent_id` double NOT NULL,
					`date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					`date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
					`content` text COLLATE utf8_unicode_ci NOT NULL,
					`liked` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
					`liked_data` text COLLATE utf8_unicode_ci NOT NULL,
					`unliked` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
					`unliked_data` text COLLATE utf8_unicode_ci NOT NULL,
					`post_by` double NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("CREATE TABLE IF NOT EXISTS `config` (
					`key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`value` text COLLATE utf8_unicode_ci NOT NULL
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
					INSERT INTO `config` (`key`, `value`) VALUES
					('main_menu', ''),
					('theme', 'tpl-02')");
					$DB->query("CREATE TABLE IF NOT EXISTS `cp_history` (
					`id` double NOT NULL AUTO_INCREMENT,
					`member` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`content` text COLLATE utf8_unicode_ci NOT NULL,
					`time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					`note` text COLLATE utf8_unicode_ci NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("CREATE TABLE IF NOT EXISTS `employ` (
					`id` int(11) NOT NULL AUTO_INCREMENT,
					`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`permission` text COLLATE utf8_unicode_ci NOT NULL,
					`email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`security` text COLLATE utf8_unicode_ci NOT NULL,
					`image` double NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2");
					$DB->query("INSERT INTO `employ` (`id`, `name`, `display_name`, `password`, `permission`, `email`, `security`, `image`) VALUES
					(1, 'employ', 'Xuân Hoàng', 'f82e62d7c3ea69cc12b5cdb8d621dab6', 'full', 'info@hoang.taka.com', '1', 0)");
					$DB->query("CREATE TABLE IF NOT EXISTS `follow` (
					`id` double NOT NULL AUTO_INCREMENT,
					`object_id` double NOT NULL,
					`data` text COLLATE utf8_unicode_ci NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("CREATE TABLE IF NOT EXISTS `media` (
					`id` double NOT NULL AUTO_INCREMENT,
					`type` int(11) NOT NULL,
					`link` text COLLATE utf8_unicode_ci NOT NULL,
					`size` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
					`date_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("CREATE TABLE IF NOT EXISTS `object` (
					`id` double NOT NULL AUTO_INCREMENT,
					`parent` text COLLATE utf8_unicode_ci NOT NULL,
					`type` int(11) NOT NULL,
					`viewed` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
					`date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					`date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
					`created_by` double NOT NULL,
					`image` text COLLATE utf8_unicode_ci NOT NULL,
					`status` tinyint(1) NOT NULL,
					`delete` tinyint(1) NOT NULL,
					`secret` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("CREATE TABLE IF NOT EXISTS `object_description` (
					`id` double NOT NULL AUTO_INCREMENT,
					`object_id` double NOT NULL,
					`name` text COLLATE utf8_unicode_ci NOT NULL,
					`content` text COLLATE utf8_unicode_ci NOT NULL,
					`meta_keyword` text COLLATE utf8_unicode_ci NOT NULL,
					`short_description` text COLLATE utf8_unicode_ci NOT NULL,
					`nice_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`lang_id` int(11) NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("CREATE TABLE IF NOT EXISTS `page` (
					`id` double NOT NULL AUTO_INCREMENT,
					`data` text COLLATE utf8_unicode_ci NOT NULL,
					`status` tinyint(1) NOT NULL DEFAULT '1',
					`icon` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-object-group',
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8");
					$DB->query("INSERT INTO `page` (`id`, `data`, `status`, `icon`) VALUES
					(1, 'a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:3:{i:0;a:1:{s:4:\"size\";s:1:\"3\";}i:1;a:2:{s:4:\"size\";s:1:\"6\";s:4:\"data\";a:1:{i:0;a:3:{s:8:\"required\";s:1:\"1\";s:5:\"title\";s:8:\"Required\";s:4:\"data\";s:0:\"\";}}}i:2;a:1:{s:4:\"size\";s:1:\"3\";}}}}}}', 1, 'fa-home'),
					(2, 'a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:3:{i:0;a:1:{s:4:\"size\";s:1:\"3\";}i:1;a:2:{s:4:\"size\";s:1:\"6\";s:4:\"data\";a:1:{i:0;a:3:{s:8:\"required\";s:1:\"1\";s:5:\"title\";s:8:\"Required\";s:4:\"data\";s:0:\"\";}}}i:2;a:1:{s:4:\"size\";s:1:\"3\";}}}}}}', 1, 'fa-object-group'),
					(3, 'a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:3:{i:0;a:1:{s:4:\"size\";s:1:\"3\";}i:1;a:2:{s:4:\"size\";s:1:\"6\";s:4:\"data\";a:1:{i:0;a:3:{s:8:\"required\";s:1:\"1\";s:5:\"title\";s:8:\"Required\";s:4:\"data\";s:0:\"\";}}}i:2;a:1:{s:4:\"size\";s:1:\"3\";}}}}}}', 1, 'fa-object-group'),
					(4, 'a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:3:{i:0;a:1:{s:4:\"size\";s:1:\"3\";}i:1;a:2:{s:4:\"size\";s:1:\"6\";s:4:\"data\";a:1:{i:0;a:3:{s:8:\"required\";s:1:\"1\";s:5:\"title\";s:8:\"Required\";s:4:\"data\";s:0:\"\";}}}i:2;a:1:{s:4:\"size\";s:1:\"3\";}}}}}}', 1, 'fa-object-group'),
					(5, '[template]a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:3:{i:0;a:1:{s:4:\"size\";s:1:\"3\";}i:1;a:2:{s:4:\"size\";s:1:\"6\";s:4:\"data\";a:1:{i:0;a:3:{s:8:\"required\";s:1:\"1\";s:5:\"title\";s:12:\"#Block Title\";s:4:\"data\";s:0:\"\";}}}i:2;a:1:{s:4:\"size\";s:1:\"3\";}}}}}}', 1, 'fa-object-group'),
					(6, 'a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:1:{i:0;a:2:{s:8:\"required\";s:1:\"1\";s:4:\"data\";a:3:{i:0;a:1:{s:4:\"size\";s:1:\"3\";}i:1;a:2:{s:4:\"size\";s:1:\"6\";s:4:\"data\";a:1:{i:0;a:3:{s:8:\"required\";s:1:\"1\";s:5:\"title\";s:8:\"Required\";s:4:\"data\";s:0:\"\";}}}i:2;a:1:{s:4:\"size\";s:1:\"3\";}}}}}}', 1, 'fa-object-group')");
					$DB->query("CREATE TABLE IF NOT EXISTS `page_description` (
					`id` double NOT NULL AUTO_INCREMENT,
					`page_id` double NOT NULL,
					`name` text COLLATE utf8_unicode_ci NOT NULL,
					`nice_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`short_description` text COLLATE utf8_unicode_ci NOT NULL,
					`lang_id` int(11) NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11");
					$DB->query("INSERT INTO `page_description` (`id`, `page_id`, `name`, `nice_url`, `short_description`, `lang_id`) VALUES
					(1, 1, 'Trang chu', 'home', 'Home page/Trang chu', 1),
					(2, 1, 'Home page', 'home', 'Home page/Trang chu', 2),
					(3, 2, 'Post view', 'post', 'Post', 1),
					(4, 2, 'Post view', 'post', 'Post', 2),
					(5, 3, 'Product view', 'product', 'Product', 1),
					(6, 3, 'Product view', 'product', 'Product', 2),
					(7, 4, 'Post category', 'post_category', 'Post category', 1),
					(8, 4, 'Post category', 'post_category', 'Post category', 2),
					(9, 6, 'Product category', 'product_category', 'Product category', 1),
					(10, 6, 'Product category', 'product_category', 'Product category', 2)");
					$DB->query("CREATE TABLE IF NOT EXISTS `product` (
					`id` double NOT NULL AUTO_INCREMENT,
					`object_id` double NOT NULL,
					`base_price` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
					`number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
					`code` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
					`sort_order` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("CREATE TABLE IF NOT EXISTS `tag` (
					`id` double NOT NULL AUTO_INCREMENT,
					`tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`nice_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`object_type` int(11) NOT NULL,
					`object_id` double NOT NULL,
					`lang_id` int(11) NOT NULL,
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("CREATE TABLE IF NOT EXISTS `web_data` (
					`id` double NOT NULL AUTO_INCREMENT,
					`domain` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`admin_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`admin_pwd` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`hint` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`database` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`folder` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
					`startdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
					`date_end` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
					PRIMARY KEY (`id`)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1");
					$DB->query("INSERT INTO `web_data` (`id`, `domain`, `admin_name`, `admin_pwd`, `hint`, `database`, `size`, `folder`, `startdate`, `date_end`) VALUES
					(12, 'http://multisite.taka.com', 'xuanhoang', 'f82e62d7c3ea69cc12b5cdb8d621dab6', 'hoang', 'taka__hoang_taka_com', '1000', 'data__hoang_taka_com', '2015-09-11 03:28:26', '0000-00-00 00:00:00')");
					//create admin data 
					//create folder 
					mkdir("data/".$folder_name);
					mkdir("data/".$folder_name."/cache");
					mkdir("data/".$folder_name."/upload");
					mkdir("data/".$folder_name."/upload/images");
					mkdir("data/".$folder_name."/upload/videos");
					
					//return info, redirect 
					return true;
				}else{
					echo "Create Database False";exit;
					return false;
				}
			}else{
				return false;
			}
		}
	}