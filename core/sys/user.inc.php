<?php
	//check access
	if (!defined('ROOT_ACCESS')) {
		echo "Access denies!";exit;
	}
	
	$USER->action = new User();
	$USER->info = $USER->action->Autorun();
	class User{
		public function __construct(){
			return true;
		}
		public function Autorun(){
			global $CMS, $DB;
			$data = "null";
			if(isset($_SESSION['user'])){
				//get user data -> append to $data
				$data = array(
					'is_login' => 1,
					'user_name' => 'xuanhoang',
				);
			}else{
				$data = array(
					'is_login' => 0,
					'user_name' => 'guest',
				);
			}
			return $data;
		}
		public function IsManager(){
			global $CMS, $DB;
			if($_SESSION['member']){
				$this->SetData();
				return true;
			}else{
				return false;
			}
		}
		public function Is_Admin(){
			if(isset($_SESSION['admin'])){
				return true;
			}else{
				return false;
			}
		}
		public function SetData(){
			global $CMS, $DB, $USER;
			if($this->Is_Admin()){
				$data = $this->LoadAdminData();
				$USER->data['display_name'] = $data['name'];
				$USER->data['email'] = $data['email'];
				$USER->data['user_image'] = $data['avatar'];
				$USER->data['permission'] = "All";
				$USER->data['admin_type'] = "Admin";
			}else{
				$data = $this->LoadMemberData();
				$USER->data['display_name'] = $data['display_name'];
				$USER->data['email'] = $data['email'];
				$USER->data['user_image'] = $data['image'];
				$USER->data['permission'] = $data['permission'];
				$USER->data['admin_type'] = "Sup member";
			}
		}
		public function LoadAdminData(){
			global $CMS, $DB, $USER;
			$DB->query("use ".WEBSITE_DBNAME);
			$sql = $DB->query("SELECT * FROM admin_data WHERE 1");
			if($data = $sql->fetchAll()){
				return $data[0];
			}else{
				return false;
			}
		}
		public function LoadMemberData(){
			global $CMS, $DB, $USER;
			$DB->query("use ".WEBSITE_DBNAME);
			$sql = $DB->query("SELECT * FROM employ WHERE name LIKE '{$CMS->admin['member']}'");
			if($data = $sql->fetchAll()){
				return $data[0];
			}else{
				return false;
			}
		}
	}